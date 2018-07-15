<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MallProductBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_product_brands', function (Blueprint $table) {
            $table->unsignedInteger('id',true);
            $table->unsignedBigInteger('category_id')->default(0)->comment('分类id');

            $table->string('name',50)->comment('品牌名称');
            $table->string('logo')->nullable()->comment('品牌Logo');
            $table->unsignedTinyInteger('status')->default(0)->commet('状态，1开启，2隐藏，3关闭');
            $table->unsignedTinyInteger('recommend')->default(0)->commet('状态，1推荐，2不推荐');
            $table->unsignedInteger('sort')->default(0)->comment('排序值');

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
        Schema::dropIfExists('mall_product_brands');
    }
}
