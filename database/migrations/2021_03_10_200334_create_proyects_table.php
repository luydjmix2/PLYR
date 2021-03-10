  
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyects', function (Blueprint $table) {
            $table->id();
            $table->string('proyect_name'); //nombre proyecto
            $table->string('proyect_description'); //descrición proyecto
            $table->string('proyect_start'); //inicio proyecto
            $table->string('proyect_end'); //final proyecto
            $table->integer('c');//create proyecto
            $table->integer('r');//read proyecto
            $table->integer('u');//update proyecto
            $table->integer('d');//delit proyecto
            $table->integer('s');//shared proyecto
            $table->unsignedBigInteger('userId'); //usuario asignado
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
        Schema::dropIfExists('proyects');
    }
}