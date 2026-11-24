<?php

namespace App\Services;

use App\Models\Drink;
use App\Http\Resources\DrinkResource;
use Illuminate\Support\Facades\Log;

class DrinkService {

    public function __construct( protected TypeService $typeService,
                                 protected PackageService $packageService ) {}
	
    public function getDrinks() {

        $drinks = Drink::with( "type", "package" )->get();

        return DrinkResource::collection( $drinks );
    }

    public function getDrink( Drink $drink ) {

        $oneDrink = $drink->load( "type", "package" );

        return ( new DrinkResource( $oneDrink ));
    }

    public function createDrink( $validated ) {

        $drink = new Drink();
        $drink->name = $validated[ "drink" ];
        $drink->amount = $validated[ "amount" ];
        $drink->price = $validated[ "price" ];
        $drink->type_id = $this->typeService->getId( $validated[ "type" ]);
        $drink->package_id = $this->packageService->getId( $validated[ "package" ]);

        $drink->save();
        
        Log::channel( "create_drink" )->notice( "Ital felvétel:", $drink->toArray() );

        return $drink;
    }

    public function updateDrink( Drink $drink, array $validated ) {

        $drink->name = $validated[ "drink" ];
        $drink->amount = $validated[ "amount" ];
        $drink->price = $validated[ "price" ];
        $drink->type_id = $this->typeService->getId( $validated[ "type" ]);
        $drink->package_id = $this->packageService->getId( $validated[ "package" ]);

        $drink->save();
        
        return $drink;
    }

    public function destroy( Drink $drink ): bool {

        $drink->delete();

        return true;
    }
}