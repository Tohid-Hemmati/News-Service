<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolesSeeder::class
        ]);

         \App\Models\User::create([
             'name'=> 'admin',
             'email' => 'admin@admin.info',
             'password' => Hash::make('password'),
             'role_id' =>1,
         ]);

         \App\Models\User::create([
            'name'=> 'author',
            'email' => 'author@autho.info',
            'password' => Hash::make('password'),
            'role_id' =>2,
        ]);

    }
}
