<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1/mall')->namespace('CrCms\Mall\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->namespace('Manage')->group(function () {

        Route::apiResource('categories', 'Product\CategoryController')->except('show')->names([
            'index' => 'mall.manage.product.categories.index',
            'store' => 'mall.manage.product.categories.store',
            'update' => 'mall.manage.product.categories.update',
            'destroy' => 'mall.manage.product.categories.destroy',
        ]);

        Route::apiResource('specifications', 'Product\SpecificationController')->except('show')->names([
            'index' => 'mall.manage.product.specifications.index',
            'store' => 'mall.manage.product.specifications.store',
            'update' => 'mall.manage.product.specifications.update',
            'destroy' => 'mall.manage.product.specifications.destroy',
        ]);

        Route::apiResource('brands', 'Product\BrandController')->except('show')->names([
            'index' => 'mall.manage.product.brands.index',
            'store' => 'mall.manage.product.brands.store',
            'update' => 'mall.manage.product.brands.update',
            'destroy' => 'mall.manage.product.brands.destroy',
        ]);

        /*Route::resource('mall', 'MallController')->names([
            'index' => 'mall.mall.index',
        ])->except(['show']);*/

    });

    Route::apiResource('products', 'ProductController')->only(['index', 'show'])->names([
        'index' => 'mall.products.index',
        'show' => 'mall.products.show',
    ]);
});
