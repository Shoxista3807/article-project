<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'shoxista',
            'email' => 'shoxistaumirbayeva7@gmail.com',
            'password' => Hash::make('Shoxista3807'),
        ]);
    }
}
