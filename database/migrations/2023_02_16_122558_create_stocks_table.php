<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // $table->id();
    //         $table->integer('stock_product_id');
    //         $table->integer('quantity');
    //         $table->text('stock_desc');
    //         $table->integer('price');
    //         $table->string('stock_brand_name');
    //         $table->string('stock_product_name');
    //         $table->integer('stock_brand_id');
    //         $table->integer('stock_product_id');
    //         $table->string('stock_img');
    //         $table->string('slug');
    //         $table->timestamps();
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('brand_id');
            $table->string('brand_name');
            $table->BigInteger('product_id');
            $table->string('product_name');
            $table->BigInteger('price');
            $table->Biginteger('product_count')->default(0);
            $table->Biginteger('quantity')->default(0);
            $table->BigInteger('stock_count')->default(0);
            $table->text('stock_desc');
            $table->string('stock_img');
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
        Schema::dropIfExists('stocks');
    }
};
