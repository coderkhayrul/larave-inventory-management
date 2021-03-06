<?php

namespace Database\Seeders;

use App\Models\BasicSetting;
use App\Models\ContactInfo;
use App\Models\SocialSetting;
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

        BasicSetting::create([
            'basic_status' => 1,
        ]);

        SocialSetting::create([
            'sm_status' => 1,
        ]);

        ContactInfo::create([
            'cont_status' => 1,
        ]);
    }
}
