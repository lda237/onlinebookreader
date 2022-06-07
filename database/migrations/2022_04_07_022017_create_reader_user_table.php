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
        Schema::create('reader_user', function (Blueprint $table) {
            $table->id();
            $table->integer('reader_id')->unsigned();
            $table->integer('user_id')->unsigned();
            // $table->foreignId('reader_id')->references('id')->on('reader')->onDelete('cascade');
            // $table->foreignId('user_id')->references('id')->on('user')->onDelete('cascade');
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
        Schema::dropIfExists('reader_user');
    }
};
