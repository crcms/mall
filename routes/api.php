<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1/mall')->namespace('CrCms\Mall\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->namespace('Manage')->group(function () {

        Route::apiResource('categories', 'CategoryController')->except('show')->names([
            'index' => 'mall.manage.categories.index',
            'store' => 'mall.manage.categories.store',
            'update' => 'mall.manage.categories.update',
            'destroy' => 'mall.manage.categories.destroy',
        ]);

        /*Route::resource('mall', 'MallController')->names([
            'index' => 'mall.mall.index',
        ])->except(['show']);*/
    });
});
