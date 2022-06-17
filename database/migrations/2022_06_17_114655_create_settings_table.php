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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',255);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('company',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('fax',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('smtpserver',255)->nullable();
            $table->string('smtpemail',255)->nullable();
            $table->string('smtppassword',255)->nullable();
            $table->integer('smtpport')->nullable()->default(0);
            $table->string('facebook',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->text('aboutus')->nullable();
            $table->text('contact')->nullable();
            $table->text('references')->nullable();
            $table->string('status',255)->nullable()->default('False');
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
        Schema::dropIfExists('settings');
    }
};
