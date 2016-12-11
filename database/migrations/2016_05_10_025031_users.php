<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('parent_id')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER `user_AFTER_INSERT` AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
             INSERT INTO profile(user_id) SELECT NEW.Id FROM users WHERE id = NEW.Id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        DB::unprepared('DROP TRIGGER `users_AFTER_INSERT`');
    }
}
