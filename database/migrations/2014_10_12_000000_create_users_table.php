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
            $table->id();
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->integer('role');
            $table->bigInteger('phone_number')->unique()->nullable();
            $table->integer('subscription_flag')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_pictures')->default('dafault.png');
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
