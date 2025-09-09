<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;

class UserWithGroupSeeder extends Seeder
{
    public function run(): void
    {
        $userGroup = Group::firstOrCreate(['name' => 'user']);
        $adminGroup = Group::firstOrCreate(['name' => 'admin']);

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'User Test', 'password' => Hash::make('password'), 'role' => 'user']
        );
        $user->groups()->syncWithoutDetaching([$userGroup->id]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin Test', 'password' => Hash::make('password'), 'role' => 'admin']
        );
        $admin->groups()->syncWithoutDetaching([$adminGroup->id]);
    }
}
