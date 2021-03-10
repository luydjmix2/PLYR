<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
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
            $table->unsignedInteger('proyect_Id'); //id proyectos documentos
            $table->unsignedInteger('group_Id'); //id grupos documentos
            $table->unsignedInteger('groupCustom_Id'); //id grupos personalizados documentos
            $table->string('name'); //nombre
            $table->string('formato'); //nombre
            $table->string('url'); //nombre 
            $table->integer('delit'); //desactivo
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
}