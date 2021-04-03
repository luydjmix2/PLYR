<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Nombre
            $table->string('first_name')->nullable(); //Nombres
            $table->string('last_name')->nullable(); //Apellidos
            $table->string('email')->unique(); //correo electronico
            $table->string('password');
            $table->string('position')->nullable(); //Cargo
            $table->unsignedInteger('phone')->nullable(); //telefono
            $table->unsignedInteger('movil')->nullable(); //movil - celular
            $table->timestamp('email_verified_at')->nullable();
            $table->string('bloomberg_email')->nullable(); //correo bloomberg
            $table->string('company')->nullable(); //Empresa
            $table->string('firm')->nullable(); //Firma
            $table->string('start_date')->nullable(); //Firma
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
