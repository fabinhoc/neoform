<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RequestManagerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->except('update');
Route::post('companies/{company}', [CompanyController::class,'update']);

Route::apiResource('request-managers', RequestManagerController::class);
