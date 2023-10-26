<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Vide la table 'users'
       User::truncate();

       // Vide la table 'roles'
       Role::truncate();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'utilisateur']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'adminadmin',
        ]);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'user',
        ]);

        $user->assignRole('admin');
        $user2->assignRole('utilisateur');

    }
}
