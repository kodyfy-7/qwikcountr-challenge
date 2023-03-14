<?php

use App\Http\Controllers\Api\V1\{
    CategoryController,
    ProductController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::get("categories", CategoryController::class);
    Route::resource("products", ProductController::class);
});