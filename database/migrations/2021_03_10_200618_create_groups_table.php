<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_description'); //descrición grupo
            $table->integer('c');//create grupo
            $table->integer('r');//read grupo
            $table->integer('u');//update grupo
            $table->integer('d');//delit grupo
            $table->integer('s');//shared grupo
            $table->integer('delit');//desactivar grupo
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
        Schema::dropIfExists('groups');
    }
}