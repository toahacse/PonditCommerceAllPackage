<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('picture')->nullable();
            $table->string('link')->nullable();
            $table->string('promotional_message')->nullable();
            $table->string('html_banner')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_draft')->default(0);
            $table->tinyInteger('max_display')->default(0);
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
        Schema::dropIfExists('banners');
    }
}
