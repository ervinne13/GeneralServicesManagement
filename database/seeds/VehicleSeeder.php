<?php

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $vehicles = [
            ["asset_code" => "VH_2015_HIACE_001", "make" => "Toyota", "model" => "Hiace", "body_style" => "Commuter Van", "capacity" => 18],
            ["asset_code" => "VH_2017_HIACE_001", "make" => "Toyota", "model" => "Hiace", "body_style" => "Commuter Van", "capacity" => 18],
            ["asset_code" => "VH_2017_URVAN_001", "make" => "Nissan", "model" => "Urvan", "body_style" => "Commuter Van", "capacity" => 18]
        ];

        Vehicle::insert($vehicles);

        $drivers = [
            ["display_name" => "John Bayola"],
            ["display_name" => "Rainer Cruz"],
        ];

        Driver::insert($drivers);
    }

}
