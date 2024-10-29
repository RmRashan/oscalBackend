<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    // Your API routes

Route::get('/distributor',[DistributorController::class,'index']);
Route::post('/distributor/create',[DistributorController::class,'store']);
Route::post('/distributor/update/{id}',[DistributorController::class,'update']);
Route::post('/distributor/delete/{id}',[DistributorController::class,'delete']);

Route::get('/agent', [AgentController::class, 'index']);
Route::post('/agent/create', [AgentController::class, 'store']);
Route::post('/agent/update/{id}', [AgentController::class, 'update']);
Route::post('/agent/delete/{id}', [AgentController::class, 'delete']);

Route::get('/dealer', [DealerController::class, 'index']);
Route::post('/dealer/create', [DealerController::class, 'store']);
Route::post('/dealer/update/{id}', [DealerController::class, 'update']);
Route::post('/dealer/delete/{id}', [DealerController::class, 'delete']);

Route::get('/model', [ModelController::class, 'index']);
Route::post('/model/create', [ModelController::class, 'store']);
Route::post('/model/update/{id}', [ModelController::class, 'update']);
Route::post('/model/delete/{id}', [ModelController::class, 'delete']);

Route::get('/brand', [BrandController::class, 'index']);
Route::post('/brand/create', [BrandController::class, 'store']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::post('/brand/delete/{id}', [BrandController::class, 'delete']);

Route::get('/colour', [ColourController::class, 'index']);
Route::post('/colour/create', [ColourController::class, 'store']);
Route::post('/colour/update/{id}', [ColourController::class, 'update']);
Route::post('/colour/delete/{id}', [ColourController::class, 'delete']);

Route::post('/item/create', [ItemController::class, 'store']);