<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Info extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain', 255);
            $table->text('name');
            $table->text('copyright')->nullable();
            $table->text('socials')->nullable();
            $table->text('logo')->nullable();
            $table->text('ga')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('address')->nullable();
            $table->text('location')->nullable();
            $table->string('email', 255)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->text('maintenance_text')->nullable();
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
        Schema::drop('info');
    }
}
