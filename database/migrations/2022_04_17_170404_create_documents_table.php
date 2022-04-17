<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_name_full'); //nombre documento con formato
            $table->string('document_name'); //nombre de documento
            $table->string('document_format'); //formato de documento
            $table->string('document_url'); //url de documento
            $table->string('origin'); //origen de documento si es la rais o es compartido
            $table->unsignedBigInteger('company_id');//Empresa id
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
