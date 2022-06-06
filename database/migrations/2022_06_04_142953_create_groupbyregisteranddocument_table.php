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
        Schema::create('groupbyregisteranddocument', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');//Group id
            $table->unsignedBigInteger('register_id')->nullable();//Register id
            $table->unsignedBigInteger('document_id')->nullable();//Register id
            $table->string('status');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('register_id')->references('id')->on('registers');
            $table->foreign('document_id')->references('id')->on('documents');
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
        Schema::dropIfExists('groupbyregisteranddocument');
    }
};
