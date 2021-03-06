<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

## Posts
\App\Http\Controllers\Web\PostController::routes();

## Group admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('admin.index');

    ## Admin posts routes
    \App\Http\Controllers\Admin\AdminPostController::routes();

});
