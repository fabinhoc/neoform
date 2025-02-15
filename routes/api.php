<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EFormController;
use App\Http\Controllers\RequestManagerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->except('update');
Route::post('companies/{company}', [CompanyController::class,'update']);

Route::apiResource('request-managers', RequestManagerController::class);
Route::apiResource('e-forms', EFormController::class);
