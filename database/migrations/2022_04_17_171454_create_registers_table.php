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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(); //Nombres
            $table->string('last_name')->nullable(); //Apellidos
            $table->string('position')->nullable(); //Cargo
            $table->string('email')->unique(); //correo electronico
            $table->unsignedInteger('phone')->nullable(); //telefono
            $table->unsignedInteger('movil')->nullable(); //movil - celular
            $table->string('bloomberg_email')->nullable(); //correo bloomberg
            $table->string('firm')->nullable(); //Firma
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
        Schema::dropIfExists('registers');
    }
};
