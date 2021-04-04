<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique(); //nombre empresa
            $table->string('company_bio')->nullable(); //biografia empresa
            $table->string('company_addres')->unique(); //direccion empresa
            $table->string('company_phone')->unique(); //telefon empresa
            $table->string('company_web')->unique(); //pagina web empresa
            $table->string('company_url_logo')->nullable(); //nombre empresa
            $table->string('company_code')->unique(); //codigo postal empresa
            $table->string('company_id')->unique(); //Rut o numero unico de identificacion empresa
            $table->string('company_politics')->nullable(); //aceptacion politicas empresa
            $table->unsignedBigInteger('user_id'); // usuario que crea la empresa
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');
    }

}
