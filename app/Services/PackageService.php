<?php

namespace App\Services;

use App\Models\Package;

class PackageService {

    public function __construct() {}
	
    public function getId( string $package_name ): int {

        $package = Package::where( "name", $package_name )->first();

        return $package->id;
    }
}