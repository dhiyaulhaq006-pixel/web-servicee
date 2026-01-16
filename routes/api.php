<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// IMPORT CONTROLLER
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\CustomController;
use App\Http\Controllers\Api\CulinaryController;


// Provinces
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/provinces/{id}', [ProvinceController::class, 'show']);

// Tours (Wisata)
Route::get('/provinces/{id}/tours', [TourController::class, 'byProvince']);

// Customs (Adat)
Route::get('/provinces/{id}/customs', [CustomController::class, 'byProvince']);

// Culinary
Route::get('/tours/{id}/culinary', [CulinaryController::class, 'byTour']);

//Store Province Request
Route::post('/provinces', [ProvinceController::class, 'store']);

