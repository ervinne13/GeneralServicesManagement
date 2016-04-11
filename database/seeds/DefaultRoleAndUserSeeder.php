<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultRoleAndUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            ["code" => "admin", "name" => "Administrator"],
            ["code" => "emp_hk", "name" => "Housekeeping Employee"],
            ["code" => "emp_sec", "name" => "Security Employee"]
        ];

        Role::insert($roles);

        $admin               = new User();
        $admin->username     = "admin";
        $admin->display_name = "Administrator";
        $admin->role_code    = "admin";
        $admin->password     = \Hash::make("password");
        $admin->save();

        $employees = [
            ["username" => "juandc", "display_name" => "Juan Dela Cruz", "role_code" => "emp_hk"],
            ["username" => "lizethb", "display_name" => "Lizeth Batarao", "role_code" => "emp_hk"],
            ["username" => "ehmarv", "display_name" => "Ehmar Villalon", "role_code" => "emp_sec"],
            ["username" => "gaba", "display_name" => "Gabrielle Agalo-os", "role_code" => "emp_sec"],
        ];

        for ($i = 0; $i < count($employees); $i ++) {
            $employees[$i]["password"] = \Hash::make("password");
        }

        User::insert($employees);
    }

}
