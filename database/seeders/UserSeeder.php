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
            'signing' => 'MyCompania',
        ]);
    }

}
