<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@superadmin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadminsuperadmin'),
            'is_admin' => true,
            'plan_id' => Plan::inRandomOrder()->first()?->id,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('useruser'),
            'is_admin' => false,
            'plan_id' => Plan::inRandomOrder()->first()?->id,
            'remember_token' => Str::random(10),
        ]);

        User::factory(25)->create();
    }
}
