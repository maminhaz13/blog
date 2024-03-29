<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->longText('product_short_description')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('product_alert_quantity')->nullable();
            $table->float('product_price')->nullable();
            $table->integer('show_discount')->default(1);
            $table->integer('show_featured')->default(1);
            $table->float('product_discount')->nullable();
            $table->float('product_discount_amount')->nullable();
            $table->string('product_thumbnail_picture')->default('default_product_thumbnail_photo.png');
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
        Schema::dropIfExists('products');
    }
}
