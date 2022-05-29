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
        Schema::create('camps', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id');
            $table->string('name',255);
            $table->string('have_you_been',10)->default('False');
            $table->text('information_from')->nullable();
            $table->string('operating_type',255);
            $table->string('camp_phone',255)->nullable();
            $table->text('address');
            $table->text('web_address')->nullable();
            $table->text('location')->nullable();
            $table->text('about_camp')->nullable();
            $table->string('image',255)->nullable();
            $table->string('status',10)->nullable()->default('False');
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
        Schema::dropIfExists('camps');
    }
};
