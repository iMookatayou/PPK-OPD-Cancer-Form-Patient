<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $adminGroup = Group::firstOrCreate(['name' => 'admin'], ['description' => 'Administrator group']);
        $userGroup = Group::firstOrCreate(['name' => 'user'], ['description' => 'General user group']);

        // 👤 ผูก user ID 1 กับ admin group
        $adminUser = User::find(1);
        if ($adminUser && !$adminUser->groups->contains($adminGroup->id)) {
            $adminUser->groups()->attach($adminGroup->id);
        }

        // 👤 ผูก user ID 2 กับ user group
        $user = User::find(2);
        if ($user && !$user->groups->contains($userGroup->id)) {
            $user->groups()->attach($userGroup->id);
        }
    }
}
