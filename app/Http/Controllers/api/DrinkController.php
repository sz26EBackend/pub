<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;

class DrinkController extends Controller {
    
    public function getDrinks() {

        $drinks = Drink::all();

        return $drinks;
    }
}
