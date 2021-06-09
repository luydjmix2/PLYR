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
            'email' => 'asd@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => 'MyCompania',
            'profile' => '1',
        ]);
        
        User::create([
            'name' => 'Admin',
            'email' => 'asdaA@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => 'MyCompania',
            'profile' => '2',
        ]);
        
        User::create([
            'name' => 'Admin',
            'email' => 'asdaB@asd.asd',
            'password' => Hash::make('123456789'),
            'company' => 'MyCompania',
            'profile' => '3',
        ]);
    }

}
