<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('admin'),
        ]);

        $author = User::create([
            'name' => "Author",
            'email' => "author@gmail.com",
            'password' => bcrypt('author'),
        ]);

        $user = User::create([
            'name' => "User",
            'email' => "user@gmail.com",
            'password' => bcrypt('user'),
        ]);

        $admin_textile = User::create([
            'name' => "Xotextile",
            'email' => "xotextile.uz@gmail.com",
            'password' => bcrypt('xotextile7700'),
        ]);

        $admin_textile2 = User::create([
            'name' => "Sherzod",
            'email' => "sherzodrasulovv@gmail.com",
            'password' => bcrypt('xotextile7700'),
        ]);

        $user_textile2 = User::create([
            'name' => "Textile",
            'email' => "werathamov@gmail.com",
            'password' => bcrypt('xotextile7700'),
        ]);

        $admin->roles()->attach($adminRole);
        $admin_textile->roles()->attach($adminRole);
        $admin_textile2->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
        $user_textile2->roles()->attach($userRole);

        factory(User::class,50) -> create();
    }
}
