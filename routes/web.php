<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulkLedgerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show', [BulkLedgerController::class, 'show']);
Route::post('/upload', [BulkLedgerController::class, 'bulkUpload'])->name('upload');
Route::get('/store-data', [BulkLedgerController::class, 'storeData']);
Route::get('/batch', [BulkLedgerController::class, 'batch'])->name('batch');
Route::get('/check-records', [BulkLedgerController::class, 'checkRecords'])->name('check-records');
Route::get('/data-distribution', [BulkLedgerController::class, 'dataDistribution'])->name('data-distribution');
