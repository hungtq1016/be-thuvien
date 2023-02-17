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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('desc');
            $table->string('image');
            $table->string('country');
            $table->string('year');
            $table->bigInteger('major_id');
            // $table->bigi('major_id')->references('id')->on('majors');
            $table->bigInteger('publisher_id');
            // $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->bigInteger('language_id');
            // $table->foreign('language_id')->references('id')->on('languages');
            $table->bigInteger('bookself_id');
            // $table->foreign('bookself_id')->references('id')->on('bookselves');
            $table->bigInteger('series_id');
            // $table->foreign('series_id')->references('id')->on('books');
            $table->boolean('status');
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
        Schema::dropIfExists('books');
    }
};
