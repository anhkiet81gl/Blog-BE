<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class)->only('index', 'show');
Route::apiResource('/tags', App\Http\Controllers\Api\TagsController::class)->only('index', 'show');
Route::apiResource('/authors', App\Http\Controllers\Api\AuthorsController::class)->only('index', 'show');
Route::apiResource('/categories', App\Http\Controllers\Api\CategoriesController::class)->only('index', 'show');
