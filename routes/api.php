<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/show-std',[studentController::class,'viewStd']);
Route::post('/store-std',[studentController::class,'storeStd']);

Route::get('/show-std-byID/{id}',[studentController::class,'viewStdById']);
Route::delete('/delete-std/{id}',[studentController::class,'deleteStd']);
Route::put('/update-std/{id}',[studentController::class,'Updatestd']);



