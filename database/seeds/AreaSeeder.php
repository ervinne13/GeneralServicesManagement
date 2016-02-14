<?php

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $areas = [
            ["code" => "F1", "name" => "1st Floor"],
            ["code" => "F2", "name" => "2nd Floor"],
            ["code" => "F3", "name" => "3rd Floor"],
            ["code" => "F4", "name" => "4th Floor"]
        ];

        Area::insert($areas);
    }

}
