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
            $table->string('appointment'); //Cargo
            $table->unsignedInteger('phone'); //telefono
            $table->unsignedInteger('movil'); //movil - celular
            $table->string('email')->unique(); //correo electronico
            $table->timestamp('email_verified_at')->nullable();
            $table->string('bloomber_email'); //correo bloomberg
            $table->string('signing'); //firma
            $table->string('password');
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
