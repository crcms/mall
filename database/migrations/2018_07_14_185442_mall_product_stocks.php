<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MallProductStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_product_stocks', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true);
            $table->unsignedBigInteger('product_id')->default(0)->comment('商品ID');
            $table->unsignedBigInteger('specification_id')->default(0)->comment('规则ID');
            $table->decimal('market_price')->default(0)->comment('市场价格');
            $table->decimal('price')->default(0)->comment('价格');
            $table->decimal('cost_price')->default(0)->comment('成本价格');
            $table->json('specification_value')->comment('规格值');
            $table->unsignedInteger('stock')->default(0)->comment('库存');
            $table->unsignedInteger('stock_alarm')->default(0)->comment('库存预警');


            $table->unsignedBigInteger('created_at')->default(0)->comment('创建时间');
            $table->unsignedBigInteger('updated_at')->default(0)->comment('修改时间');
            $table->unsignedBigInteger('deleted_at')->nullable()->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_product_stocks');
    }
}
