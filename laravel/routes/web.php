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


Route::group(['namespace' => 'Web', 'prefix' => '/', 'middleware' => []], function () {
    //首页view
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', [\App\Http\Controllers\Web\TestController::class, 'index']); //测试
});

