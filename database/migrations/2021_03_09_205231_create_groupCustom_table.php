<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_custom', function (Blueprint $table) {
            $table->id();
            $table->string('group_custom_description'); //descrición grupo personalizado
            $table->integer('c');//create grupo personalizado
            $table->integer('r');//read grupo personalizado
            $table->integer('u');//update grupo personalizado
            $table->integer('d');//delit grupo personalizado
            $table->integer('s');//shared grupo personalizado
            $table->integer('dalit');//desactivo grupo personalizado
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
        Schema::dropIfExists('group_custom');
    }
}
