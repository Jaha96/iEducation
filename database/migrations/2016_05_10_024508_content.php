<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Content extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('content_category_id')->nullable();
            $table->integer('content_sub_category_id')->nullable();
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('thumb')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_publish')->default(true);
            $table->boolean('is_comment')->default(true);
            $table->integer('status')->default(0);
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
        Schema::drop('content');
    }
}
