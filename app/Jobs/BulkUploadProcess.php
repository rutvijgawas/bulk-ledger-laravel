<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TemporaryCompletedata;
use Illuminate\Bus\Batchable;

class BulkUploadProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;
    /**
     * Create a new job instance.
     */
    public function __construct($data,$header)
    {
        $this->data   = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        foreach ($this->data as $val) {
            $combinData = array_combine($this->header, $val);
            TemporaryCompletedata::create($combinData);
        }
       
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

    }
}
