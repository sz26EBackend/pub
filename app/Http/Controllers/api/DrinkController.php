<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Services\DrinkService;
use App\traits\ResponseHandler;
use App\Http\Requests\DrinkRequest;

class DrinkController extends Controller {
    
    use ResponseHandler;

    public function __construct( protected DrinkService $drinkService ) {}

    public function index() {

        $drinks = $this->drinkService->getDrinks();

        return $this->sendResponse( $drinks );
    }

    public function show( Drink $drink ) {

        $oneDrink = $this->drinkService->getDrink( $drink );

        return $this->sendResponse( $oneDrink );
    }

    public function create( DrinkRequest $request ) {

        $validated = $request->validated();

        $result = $this->drinkService->createDrink( $validated );

        return $this->sendResponse( $result, "Sikeres kiírás", 201 );
    }

    public function update( Drink $drink, DrinkRequest $request ) {

        $validated = $request->validated();

        $drink = $this->drinkService->updateDrink( $drink, $validated );

        return $this->sendResponse( $drink->name, "Sikeres frissítés", 201 );
    }

    public function delete( Drink $drink ) {

        $this->drinkService->destroy( $drink );

        return $this->sendResponse( $drink->name, "Sikeres törlés" );
    }
}
