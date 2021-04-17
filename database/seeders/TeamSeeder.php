<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\team;

class TeamSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        team::create([
            'user_id' => '2',
            'id_group' => '1',
            'id_company' => '1',
        ]);
    }

}
