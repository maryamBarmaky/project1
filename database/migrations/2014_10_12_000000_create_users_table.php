<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('role')->default('member');
            $table->date('birthday')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('location')->nullable();
            $table->string('bio')->nullable();
            $table->string('language_singer')->nullable();
            $table->string('patogh')->nullable();
            $table->string('extra_art')->nullable();
            $table->string('instagram')->nullable();
            ///////////////
            $table->string('grade')->nullable();
//            $table->integer('like')->nullable();    //پسند کرده ها
//            $table->integer('follower')->nullable();     //دنبال کننده ها
//            $table->integer('view')->nullable();      //بازدید از پروفایل

            $table->integer('sabk_id')->default(1);
            $table->foreign('sabk_id')->references('id')->on('sabks')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
