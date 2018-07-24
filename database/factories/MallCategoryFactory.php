<?php

use Faker\Generator as Faker;
use CrCms\Mall\Models\ProductModel;
use CrCms\Mall\Models\ProductBrandModel;
use Carbon\Carbon;
use CrCms\Mall\Models\ProductSpecificationModel;

$categoryArray = [175, 180, 181, 182, 183];

$factory->define(ProductModel::class, function (Faker $faker) use ($categoryArray){
    return [
        'name' => $faker->name,
        'category_id' => $categoryArray[array_rand($categoryArray)],
        'brand_id' => function () {
            return factory(ProductBrandModel::class)->create()->id;
        },
        'market_price' => $faker->randomFloat(null, 1, 9999),
        'price' => $faker->randomFloat(null, 1, 9999),
        'cost_price' => $faker->randomFloat(null, 1, 9999),
        'stock' => mt_rand(20, 9999),
        'stock_alarm' => mt_rand(20, 9999),
        'area_id' => mt_rand(20, 9999),
        'image' => 'https://img11.360buyimg.com/cms/jfs/t8482/356/1789908690/65721/b3fcd2f6/59bf6409N23c35ff0.jpg!q95.webp',
        'recommend' => mt_rand(1, 2),
        'coding' => $faker->creditCardNumber,
        'sales_status' => mt_rand(1, 2),
        'review_status' => mt_rand(1, 3),
        'sort' => mt_rand(1, 99999),
        'added_at' => Carbon::now()->getTimestamp() + mt_rand(-86400, 86400),
        'dismounted_at' => Carbon::now()->getTimestamp() + mt_rand(-86400, 86400),
    ];
});
/*->create()->each(function($model){
    $model->belongsToManyStocks()->save(factory(\CrCms\Mall\Models\ProductStockModel::class,16)->create());
    $model->hasOneDetail()->save(factory(\CrCms\Mall\Models\ProductDetailModel::class,1)->create());
});*/

$factory->afterCreating(ProductModel::class, function ($model, $faker) {
    factory(\CrCms\Mall\Models\ProductStockModel::class, 16)->create(['product_id' => $model->id]);
    factory(\CrCms\Mall\Models\ProductDetailModel::class, 1)->create(['id' => $model->id]);
});

$factory->define(ProductBrandModel::class, function (Faker $faker) {
    return [
        'category_id' => 0,
        'name' => $faker->name,
        'logo' => 'http://www.logoquan.com/upload/logo/logo.jpg',
        'status' => 1,
        'sort' => mt_rand(1, 999),
        'recommend' => mt_rand(1, 2),
    ];
});

$factory->define(ProductSpecificationModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => 0,
        'status' => 1,
        'sort' => mt_rand(1, 999),
    ];
});

$factory->define(\CrCms\Mall\Models\ProductStockModel::class, function (Faker $faker) {
    return [
//        'product_id' => function (array $data) {
//            return App\User::find($post['user_id'])->type;
//        }
        'specification' => json_encode([
            1 => ['value1','value2'],
            2 => ['value3','value4'],
        ]),
        /*function () {
            return factory(ProductSpecificationModel::class,1)->create()->id;
        }*/
        'market_price' => $faker->randomFloat(null, 1, 9999),
        'price' => $faker->randomFloat(null, 1, 9999),
        'cost_price' => $faker->randomFloat(null, 1, 9999),
        'stock' => $faker->numberBetween(10, 9999),
        'stock_alarm' => $faker->numberBetween(10, 9999),
        'image' => 'https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=1991655845,711623482&fm=58&s=D59A7C33A4F1F1921F770D55030080A2&bpow=121&bpoh=75',
    ];
});


$factory->define(\CrCms\Mall\Models\ProductDetailModel::class, function (Faker $faker) {
    return [
        'characteristic' => $faker->title,
        'detail' => $faker->randomHtml(2, 4),
        'attributes' => json_encode([
            [
                'name' => '功能',
                'values' => [
                    ['name' => '制冷类型', 'value' => '定频/变频', 'description' => $faker->text(100)],
                    ['name' => '匹数', 'value' => '3匹', 'description' => '空调的匹数表示空调的制冷量大小，也就是制冷能力的大小，其制冷量以输出功率计算。一般来说1匹的制冷量大致为2000大卡，以国际单位换算应乘以1.162，故一匹制冷量为2000ｘ1.162＝2324W。这里的W(瓦)即表示制冷量。1.5匹的应为2000ｘ1.5ｘ1.162＝3486W，依此类推。'],
                    ['name' => '能效等级', 'value' => '3级', 'description' => $faker->text(100)],
                    ['name' => '适用面积(平方米)', 'value' => '30-40', 'description' => $faker->text(100)],
                    ['name' => '制冷量(W)', 'value' => '额定值7200', 'description' => $faker->text(100)],
                ],
            ]
        ]),
    ];
});