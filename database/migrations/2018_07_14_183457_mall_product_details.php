<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MallProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->default(0);

            $table->string('characteristic')->nullable()->comment('特点');
            $table->text('detail')->nullable()->comment('详情');
            $table->json('attributes')->nullable()->comment('属性，二级JSON');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_product_details');
    }
}
