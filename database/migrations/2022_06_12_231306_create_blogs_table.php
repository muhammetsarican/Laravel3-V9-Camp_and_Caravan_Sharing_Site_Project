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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',255);
            $table->text('post');
            $table->integer('camp_id');
            $table->integer('user_id');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image',255)->nullable();
            $table->string('status',5)->nullable()->default('False');
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
