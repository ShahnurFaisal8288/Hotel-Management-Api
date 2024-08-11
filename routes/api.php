<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/communityPost',[ApiController::class,'communityPost']);
Route::get('/communityGet',[ApiController::class,'communityGet']);






