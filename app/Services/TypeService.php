<?php

namespace App\Services;

use App\Models\Type;

class TypeService {

    public function __construct() {}
	
    public function getId( string $type_name ): int {

        $type = Type::where( "name", $type_name )->first();

        return $type->id;
    }
}