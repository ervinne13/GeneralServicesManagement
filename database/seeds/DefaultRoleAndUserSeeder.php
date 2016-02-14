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
            ["code" => "employee", "name" => "Employee"]
        ];

        Role::insert($roles);

        $admin               = new User();
        $admin->username     = "admin";
        $admin->display_name = "Administrator";
        $admin->role_code    = "admin";
        $admin->password     = \Hash::make("password");
        $admin->save();

        $employees = [
            ["username" => "juandc", "display_name" => "Juan Dela Cruz"],
            ["username" => "lizethb", "display_name" => "Lizeth Batarao"],
            ["username" => "ehmarv", "display_name" => "Ehmar Villalon"],
            ["username" => "gaba", "display_name" => "Gabrielle Agalo-os"],
        ];

        for ($i = 0; $i < count($employees); $i ++) {
            $employees[$i]["role_code"] = "employee";
            $employees[$i]["password"] = \Hash::make("password");
        }

        User::insert($employees);
    }

}
