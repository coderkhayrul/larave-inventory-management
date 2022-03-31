<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'phone' => '01835061968',
            'role' => '1',
            'status' => '1',
            'active' => '1',
            'slug' => 'U-2500',
            'password' => Hash::make('password'),
        ]);
    }
}
