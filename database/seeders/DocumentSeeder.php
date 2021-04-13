<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Document::create([
            'document_name_full' => 'photo1.jpg',
            'document_name' => 'photo1',
            'document_format' => 'jpg',
            'document_url' => '/media/photos/photo1.jpg',
            'group_id' => '1',
        ]);
    }

}
