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
        Schema::create('editors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',255);
            $table->integer('number_of_contributions')->nullable();
            $table->string('photo',2020)->nullable();
            $table->string('instagram',2000)->nullable();
            $table->string('youtube',2000)->nullable();
            $table->text('biography');
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
        Schema::dropIfExists('editors');
    }
};
