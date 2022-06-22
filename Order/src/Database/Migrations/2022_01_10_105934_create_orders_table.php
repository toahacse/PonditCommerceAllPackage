<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_information_id')->nullable();
            $table->string('order_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('order_date')->nullable();
            $table->string('barcode')->nullable();
            $table->string('product_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('order_status')->nullable()->default('Pending');
            $table->string('comments')->nullable();
            $table->tinyInteger('is_seen')->nullable()->default(0);
            $table->tinyInteger('is_paid')->nullable()->default(0);
            $table->tinyInteger('is_confirm')->nullable()->default(0);
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
        Schema::dropIfExists('orders');
    }
}
