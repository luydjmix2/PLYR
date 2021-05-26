<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User_alert;

class UseralertSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User_alert::create([
            'u_alerts_id_group' => '1',
            'u_alerts_id_company' => '1',
            'u_alerts_mail' => 'luydjmix@gmail.com',
            'u_alerts_movil' => '3158111878',
        ]);
    }

}
