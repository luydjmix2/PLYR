<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyect;

class ProyectSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Proyect::create([
            'proyect_name' => 'demo',
            'proyect_description' => 'Example the proyect in app PL&R',
            'proyect_start' => '2021-03-20',
            'proyect_end' => '2021-04-20',
            'proyect_url' => 'demo',
            'proyect_shared' => '1',
            'user_id' => '1',
        ]);
    }

}
