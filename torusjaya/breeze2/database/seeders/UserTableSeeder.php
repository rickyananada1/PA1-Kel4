<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'website administrator';
        $admin->email = 'admin@local.test';
        $admin->password = Hash::make('letmein');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'adminr')->first());

        $user = new User;
        $user->name = 'web user';
        $user->email = 'user@local.test';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
