<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use App\Models\TemporaryCompletedata;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\BulkUploadProcess;
use Illuminate\Support\Facades\Bus;
use App\Models\Branch;
use App\Models\FeeCategory;
use App\Models\EntryMode;
use App\Models\Module;
use App\Models\FeeCollectionType;
use App\Models\FeeType;

class BulkLedgerController extends Controller
{
    //

    public function __construct()
    {
        ini_set('post_max_size', '1024M');
        ini_set('upload_max_filesize', '1024M');
        ini_set('max_input_time', '-1');
        ini_set('max_execution_time', '3000');
        ini_set('memory_limit', '10240M');

        // dd(phpinfo());
    }

    public function show()
    {
        dd('gfdgfdg');
    }
    public function bulkUpload(Request $request)
    {

       if(request()->has('fileUpload'))
       {    
            // $data = array_map( 'str_getcsv', file(request()->fileUpload));
            $data = file(request()->fileUpload);

            array_splice($data, 0, 4);

            
            $chunks = array_chunk($data, 1000);
            $header = [];
            $batch  = Bus::batch([])->dispatch();
            foreach($chunks as $k => $chunk)
            {
                $chuckData = array_map( 'str_getcsv', $chunk);
                if($k == 0)
                {
                    $header = $chuckData[0];
                
                    foreach($header as $key => $field)
                    {
                        $header[$key] = str_replace([' ','/'], '_', $field);
                    }

                    unset($chuckData[0]);
                }
             
                $batch->add(new BulkUploadProcess($chuckData, $header));

                // $combinData = array_combine($header, $val);
                // $path = resource_path('temp');
                // if (!File::exists($path)) {
                //     File::makeDirectory($path, $mode = 0777, true, true);
                // }
                // // Generate a unique filename
                // $name = "/tmp{$k}.csv";

                // // Write the contents to the file
                // file_put_contents($path . $name, $val);
                // BulkUploadProcess::dispatch($chuckData,$header);
            }
            $batchId = $batch->id;

            return redirect()->route('batch', ['id' => $batchId]);
            // dd('Added to queue');
        }
        return "Please Upload File";
    }

    public function batch()
    {
        $batchId = request('id');
        $progress = Bus::findBatch($batchId);

        if($progress->progress() == 100)
        {
            return redirect()->route('check-records');
        }
        return view('progress', compact('progress'));
    }

    public function checkRecords()
    {
        // Count of records
        $countOfRecords = TemporaryCompletedata::count();

        // Sum of Due Amount
        $sumOfDueAmount = TemporaryCompletedata::sum('due_amount');

        // Sum of Paid Amount
        $sumOfPaidAmount = TemporaryCompletedata::sum('paid_amount');

        // Sum of Concession
        $sumOfConcession = TemporaryCompletedata::sum('Concession_Amount');

        // Sum of Scholarship
        $sumOfScholarship = TemporaryCompletedata::sum('Scholarship_Amount');

        // Sum of Refund
        $sumOfRefund = TemporaryCompletedata::sum('Refund_Amount');

        // Output the results

        return view('verify', compact('countOfRecords','sumOfDueAmount','sumOfPaidAmount','sumOfConcession','sumOfScholarship','sumOfRefund'));

    }

    public function dataDistribution()
    {
        $TemporaryCompletedata = TemporaryCompletedata::select('Faculty','Fee_Category','Voucher_Type','Fee_Head')->get();
        $branches = $TemporaryCompletedata->pluck('Faculty')->unique();
        $feeCategory = $TemporaryCompletedata->pluck('Fee_Category')->unique();
        $feeTypes = $TemporaryCompletedata->pluck('Fee_Head')->unique();
        $entryType = Module::pluck('module_name')->unique();

        /**Insert into branches table */
        foreach($branches as $branchName)
        {
            $branch = new Branch();
            $branch->branch_name = $branchName; // Assuming 'name' field exists in temporardata
            $branch->save();

            // Insert into feecategory table
            foreach($feeCategory as $category)
            {
                $feecategory = new FeeCategory();
                $feecategory->fee_category = $category;
                $feecategory->br_id = $branch->id;
                $feecategory->save();
            }

            // Insert into feecollection table
            foreach($entryType as $type)
            {
                $feeCollectionType = new FeeCollectionType();
                $feeCollectionType->collectionhead = $type;
                $feeCollectionType->collectiondesc = $type;
                $feeCollectionType->br_id = $branch->id;
                $feeCollectionType->save();
            }

            /**get fee category id */
            $feeCategoryId = FeeCategory::where('br_id', $branch->id)->select('id')->get();

            /**get collection head from feecollection type */
            $collectionData  = FeeCollectionType::where('br_id', $branch->id)->select('id','collectionhead')->first();

            /**get fee type id from feetype */
            $feeTypeId     = FeeType::where('Br_id', $branch->id)->select('id')->get();

            /**get fee head type from module */
            $moduleId = Module::where('module_name', $collectionData->collectionhead)->select('id')->first();

            // Insert into feetype table
            foreach($feeTypes as $feeType)
            {
                $feecategory = new FeeType();
                $feecategory->Fee_category = $feeCategoryId;
                $feecategory->F_name = $feeType;
                $feecategory->Collection_id = $collectionData->id;
                $feecategory->Br_id = $branch->id;
                $feecategory->Seq_id = ($feeType == 'Tution Fee') ? 1 : 2;
                $feecategory->Fee_type_ledger = $feeType;
                $feecategory->Fee_head_type = $moduleId['id'];
                $feecategory->save();
            }

            dd('done');
          
        }
    

    }


    public function storeData()
    {

        /**queue dispatch */

        // BulkUploadProcess ::dispatch();
        // $path = resource_path('temp');
        // $files = glob("$path/*.csv");

        // $header = [];
        // foreach($files as $k => $file)
        // {
        //     $data = array_map('str_getcsv', file($file));
          
        //     if($k == 0)
        //     {
        //         $header = $data[0];
               
        //         foreach($header as $key => $field)
        //         {
        //             $header[$key] = str_replace([' ','/'], '_', $field);
        //         }

        //         unset($data[0]);
        //     }
        //     foreach($data as $val)
        //     {
        //         $combinData = array_combine($header, $val);
        //         TemporaryCompletedata::create($combinData);
        //     }

        //     unlink($file);
        // }

        // return "stored";
    }
}
