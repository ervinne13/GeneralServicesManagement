<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        try {
            DB::beginTransaction();

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            DB::table("area_task")->truncate();
            DB::table("equipment_location")->truncate();

            DB::table("area")->truncate();
            DB::table("task")->truncate();
            DB::table("equipment")->truncate();
            DB::table("vehicle")->truncate();

            DB::table("user")->truncate();
            DB::table("role")->truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $this->call(DefaultRoleAndUserSeeder::class);
            $this->call(AreaSeeder::class);
            $this->call(TaskSeeder::class);
            $this->call(EquipmentSeeder::class);
            $this->call(VehicleSeeder::class);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

}
