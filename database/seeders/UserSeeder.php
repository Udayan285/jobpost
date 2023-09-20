<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Mohi";
        $user->designation = "Web Developer";
        $user->email = "mohi@gmail.com";
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('admin');

        
    }
}
