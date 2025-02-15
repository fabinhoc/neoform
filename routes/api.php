<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->except('update');
Route::post('companies/{company}', [CompanyController::class,'update']);
