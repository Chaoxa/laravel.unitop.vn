<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product', 100);
            $table->text('content')->nullable();
            $table->string('price');
            $table->unsignedBigInteger('product_cat_parent')->nullable();
            $table->unsignedBigInteger('creator')->nullable();
            $table->foreign('product_cat_parent')->references('product_cat_id')->on('tbl_cat_product')->onDelete('cascade');
            $table->foreign('creator')->references('id')->on('tbl_users')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_products');
    }
}
