<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', config('app.admins.email'))->exists();
        if(!$user)
        {
            User::create([
                'role' => config('app.admins.role'),
                'name' => config('app.admins.name'),
                'email' => config('app.admins.email'),
                'password' => config('app.admins.password'),
                'email_verified_at' => now()
            ]);
        }
    }
}
