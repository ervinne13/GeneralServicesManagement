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
            ["role_code" => "emp_hk", "code" => "gen-clean", "name" => "General Cleaning"],
            ["role_code" => "emp_hk", "code" => "AC-install", "name" => "Aircon Installation"],
            ["role_code" => "emp_sec", "code" => "patrol", "name" => "Patrol"],
            ["role_code" => "emp_sec", "code" => "detailing", "name" => "Detailing"],
            ["role_code" => "emp_sec", "code" => "duty", "name" => "Duty"],
        ];

        Task::insert($tasks);
    }

}
