<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupCustomUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_custom_user', function (Blueprint $table) {
            $table->id();//group_custom
            $table->unsignedInteger('groupCustom_Id');
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
        Schema::dropIfExists('group_custom_user');
    }
}
