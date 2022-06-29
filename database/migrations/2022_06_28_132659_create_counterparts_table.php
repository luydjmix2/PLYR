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
        Schema::create('counterparts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupbyregisteranddocument_id');//Group id
            $table->unsignedBigInteger('usercompany_id');//Group id
            $table->foreign('groupbyregisteranddocument_id')->references('id')->on('groupbyregisteranddocument');
            $table->foreign('usercompany_id')->references('id')->on('usercompany');
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
        Schema::dropIfExists('counterparts');
    }
};
