<?php

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $tasks = [
            ["code" => "gen-clean", "name" => "General Cleaning"],
            ["code" => "AC-install", "name" => "Aircon Installation"],
        ];

        Task::insert($tasks);
    }

}
