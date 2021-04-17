<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\company;

class CompanySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        company::create([
            'company_name' => 'MyCompania',
            'company_bio' => 'demo Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s.',
            'company_address' => 'streep demo 01',
            'company_phone' => '1000000',
            'company_web' => 'https//demo.com',
            'company_url_logo' => '/media/various/ecom_product8.png',
            'company_code' => '00010',
            'company_nid' => '789420',
            'company_politics' => 'yes',
            'user_id' => '2',
        ]);
    }

}
