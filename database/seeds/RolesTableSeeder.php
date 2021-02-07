<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::truncate();
        Role::create(['name' => "admin"]);
        Role::create(['name' => "author"]);
        Role::create(['name' => "user"]);
    }
}
