<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestmonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testmonials', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('reviewer_name');
            $table->string('reviewer_email');
            $table->string('reviewer_position')->default('User');
            $table->longText('review_full');
            $table->integer('show_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testmonials');
    }
}
