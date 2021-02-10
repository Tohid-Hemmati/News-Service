<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Roles::create([
            'name'=>'super-admin'
        ]);
        $role=Roles::create([
            'name'=>'author'
        ]);
    }
}
