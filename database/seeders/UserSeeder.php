<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'User1',
            'email' => 'asd@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => '1',
            'profile' => '1',
            'status' => '1',
        ]);

        User::create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'User2',
            'email' => 'asdaA@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => '1',
            'profile' => '2',
            'status' => '1',
        ]);

        User::create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'User3',
            'email' => 'asdaB@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => '1',
            'profile' => '3',
            'status' => '1',
        ]);
    }

}
