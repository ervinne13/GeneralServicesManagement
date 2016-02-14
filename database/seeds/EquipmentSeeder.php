<?php

use App\Models\Equipment;
use App\Models\EquipmentLocation;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $equipments = [
            ["id" => 1, "name" => "Broom", "stock" => 40],
            ["id" => 2, "name" => "Mop", "stock" => 25],
            ["id" => 3, "name" => "Screwdriver Set", "stock" => 10],
            ["id" => 4, "name" => "Hammer", "stock" => 5]
        ];

        Equipment::insert($equipments);

        $equipmentLocation = [
            //  broom
            ["equipment_id" => 1, "area_code" => "F1", "qty" => 7],
            ["equipment_id" => 1, "area_code" => "F2", "qty" => 5],
            ["equipment_id" => 1, "area_code" => "F3", "qty" => 5],
            //  mops
            ["equipment_id" => 2, "area_code" => "F1", "qty" => 5],
            ["equipment_id" => 2, "area_code" => "F2", "qty" => 3],
            ["equipment_id" => 2, "area_code" => "F3", "qty" => 3],
        ];

        EquipmentLocation::insert($equipmentLocation);
    }

}
