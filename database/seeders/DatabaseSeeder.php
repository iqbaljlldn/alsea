<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Driver;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()->create([
            'name' => 'Ding Dong',
        ]);
        Driver::factory()->create([
            'name' => 'Moo Deng',
        ]);
        Role::factory()->create([
            'name' => 'Admin',
        ]);
    }
}
