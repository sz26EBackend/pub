<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;

// Italok
Route::get( "/drinks", [ DrinkController::class, "index" ]);
Route::get( "/drinks/{drink}", [ DrinkController::class, "show" ]);
Route::post( "drinks", [ DrinkController::class, "create" ]);
Route::put( "/drinks/{drink}", [ DrinkController::class, "update" ]);
Route::delete( "/drinks/{drink}", [ DrinkController::class, "delete" ]);