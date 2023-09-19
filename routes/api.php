<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;

Route::get('/', function() {
    return response()-> json([
    'Success' => true
]);
});

Route::get('/computadores',[OficinaController::class,'index']);
Route::get('/computadores{id}',[OficinaController::class,'show']);
Route::post('/computadores',[OficinaController::class,'store']);
Route::delete('/computadores{id}',[OficinaController::class,'destroy']);
Route::put('/computadores/{id}',[OficinaController::class,'update']);