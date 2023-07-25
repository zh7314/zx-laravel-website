<?php

use App\Http\Controllers\Web\TestController;
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

//页面相关
Route::group(['namespace' => 'Web', 'prefix' => '/', 'middleware' => ['cors', 'csrf']], function () {
    //首页view
    Route::get('/', function () {
        return view('welcome');
    });

    //消息面板
    Route::group(['prefix' => 'message'], function () {
        Route::get('/', [\App\Http\Controllers\Web\MessageController::class, 'index']);
    });
});

//api接口相关
Route::group(['namespace' => 'Web', 'prefix' => '/', 'middleware' => ['cors', 'api.log']], function () {

    Route::get('/test', [TestController::class, 'index']); //测试

    Route::post('/uploadPic', [\App\Http\Controllers\Web\IndexController::class, 'uploadPic']);//上传图片文件
    Route::post('/uploadFile', [\App\Http\Controllers\Web\IndexController::class, 'uploadFile']);//上传普通文件

    Route::post('/messageUploadPic', [\App\Http\Controllers\Web\IndexController::class, 'messageUploadPic']);//上传图片文件

    Route::group(['prefix' => 'message'], function () {
        Route::post('/feedback', [\App\Http\Controllers\Web\MessageController::class, 'feedback']); //提交反馈

    });

});
