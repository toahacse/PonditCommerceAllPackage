<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('category_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('warrinty_type')->nullable();
            $table->string('warrinty_piriod')->nullable();
            $table->string('weight')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('special_price')->nullable();
            $table->string('mrp')->nullable();
            $table->string('status')->nullable();
            $table->string('sku')->nullable();
            $table->string('label_id')->nullable();
            $table->string('total_sales')->nullable();
            $table->string('product_type')->nullable();
            $table->string('picture')->nullable();
            $table->tinyInteger('is_new')->nullable()->default(0);
            $table->tinyInteger('is_active')->nullable()->default(0);
            $table->tinyInteger('is_draft')->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
