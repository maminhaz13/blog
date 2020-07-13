<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_writer')->nullable();
            $table->longText('blog_content')->nullable();
            $table->string('blog_thumbnail_picture')->nullable()->default('blog_thumbnail_picture.jpg');
            $table->string('commentor_name')->nullable();
            $table->string('commentor_email')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('slug')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
