<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservee extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('vehicle_reservation', function ($table) {
                if (!Schema::hasColumn('vehicle_reservation', 'reserve_to')) {
                    $table->string('reserve_to', 100)->nullable();
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        try {
            DB::beginTransaction();

            Schema::table('vehicle_reservation', function ($table) {
                if (Schema::hasColumn('vehicle_reservation', 'reserve_to')) {
                    $table->dropColumn('reserve_to');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
