<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1')->namespace('CrCms\Mall\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->namespace('Manage')->group(function(){

        Route::apiResource('categories','CategoryController');

        /*Route::resource('mall', 'MallController')->names([
            'index' => 'mall.mall.index',
        ])->except(['show']);*/
    });
});
