<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('main_banner_title')->nullable();
            $table->longText('main_banner_short_description')->nullable();
            $table->string('main_banner_picture')->default('default_main_banner_picture.png')->nullable();
            $table->string('discount_banner_title')->nullable();
            $table->integer('discount_banner_percentage')->nullable();
            $table->string('discount_banner_text_one')->nullable();
            $table->string('discount_banner_text_two')->nullable();
            $table->string('discount_banner_picture')->default('default_discount_banner_picture.png')->nullable();
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
        Schema::dropIfExists('homes');
    }
}
