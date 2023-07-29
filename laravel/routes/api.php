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

//后台api接口
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin.log']], function () {
    Route::post('/login', [\App\Http\Controllers\Admin\IndexController::class, 'login']); //登录请求
    Route::get('/getCaptcha', [\App\Http\Controllers\Admin\IndexController::class, 'getCaptcha']); //获取验证码
    // 上传图片
    Route::post('/uploadPic', [\App\Http\Controllers\Admin\IndexController::class, 'uploadPic']);//上传图片文件
    Route::post('/uploadFile', [\App\Http\Controllers\Admin\IndexController::class, 'uploadFile']);//上传普通文件
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin.log', 'admin.check']], function () {

    Route::post('/getMenu', [\App\Http\Controllers\Admin\IndexController::class, 'getMenu']); //获取菜单信息
    Route::post('/getInfo', [\App\Http\Controllers\Admin\IndexController::class, 'getInfo']); //获取用户信息
    Route::post('/logout', [\App\Http\Controllers\Admin\IndexController::class, 'logout']); //登出
    Route::post('/getVersion', [\App\Http\Controllers\Admin\IndexController::class, 'getVersion']); //获取版本信息
    Route::post('/changePwd', [\App\Http\Controllers\Admin\IndexController::class, 'changePwd']);

    Route::post('/getGroupTree', [\App\Http\Controllers\Admin\IndexController::class, 'getGroupTree']);//获取权限组树状结构
    Route::post('/getMenuTree', [\App\Http\Controllers\Admin\IndexController::class, 'getMenuTree']);//获取所有权限树状结构
    Route::post('/getDownloadCateTree', [\App\Http\Controllers\Admin\IndexController::class, 'getDownloadCateTree']);
    Route::post('/getNewsCateTree', [\App\Http\Controllers\Admin\IndexController::class, 'getNewsCateTree']);
    Route::post('/getProductCateTree', [\App\Http\Controllers\Admin\IndexController::class, 'getProductCateTree']);
    Route::post('/getVideoCateTree', [\App\Http\Controllers\Admin\IndexController::class, 'getVideoCateTree']);
    Route::post('/getBannerCateTree', [\App\Http\Controllers\Admin\IndexController::class, 'getBannerCateTree']);

    Route::group(['prefix' => 'admin'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\AdminController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\AdminController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\AdminController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\AdminController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\AdminController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\AdminController::class, 'delete']);
    });

    Route::group(['prefix' => 'adminGroup'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\AdminGroupController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\AdminGroupController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\AdminGroupController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\AdminGroupController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\AdminGroupController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\AdminGroupController::class, 'delete']);
    });

    Route::group(['prefix' => 'adminLog'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\AdminLogController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\AdminLogController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\AdminLogController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\AdminLogController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\AdminLogController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\AdminLogController::class, 'delete']);
    });

    Route::group(['prefix' => 'adminPermission'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\AdminPermissionController::class, 'delete']);
    });

    Route::group(['prefix' => 'banner'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\BannerController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\BannerController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\BannerController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\BannerController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\BannerController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\BannerController::class, 'delete']);
    });

    Route::group(['prefix' => 'bannerCate'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\BannerCateController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\BannerCateController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\BannerCateController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\BannerCateController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\BannerCateController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\BannerCateController::class, 'delete']);
    });

    Route::group(['prefix' => 'config'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\ConfigController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\ConfigController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\ConfigController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\ConfigController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\ConfigController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\ConfigController::class, 'delete']);
    });

    Route::group(['prefix' => 'download'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\DownloadController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\DownloadController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\DownloadController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\DownloadController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\DownloadController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\DownloadController::class, 'delete']);
    });

    Route::group(['prefix' => 'downloadCate'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\DownloadCateController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\DownloadCateController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\DownloadCateController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\DownloadCateController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\DownloadCateController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\DownloadCateController::class, 'delete']);
    });

    Route::group(['prefix' => 'feedback'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\FeedbackController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\FeedbackController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\FeedbackController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\FeedbackController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\FeedbackController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\FeedbackController::class, 'delete']);
    });

    Route::group(['prefix' => 'file'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\FileController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\FileController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\FileController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\FileController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\FileController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\FileController::class, 'delete']);
    });

    Route::group(['prefix' => 'friendLink'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\FriendLinkController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\FriendLinkController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\FriendLinkController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\FriendLinkController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\FriendLinkController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\FriendLinkController::class, 'delete']);
    });

    Route::group(['prefix' => 'jobOffers'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\JobOffersController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\JobOffersController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\JobOffersController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\JobOffersController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\JobOffersController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\JobOffersController::class, 'delete']);
    });

    Route::group(['prefix' => 'lang'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\LangController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\LangController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\LangController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\LangController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\LangController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\LangController::class, 'delete']);
    });

    Route::group(['prefix' => 'news'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\NewsController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\NewsController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\NewsController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\NewsController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\NewsController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\NewsController::class, 'delete']);
    });

    Route::group(['prefix' => 'newsCate'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\NewsCateController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\NewsCateController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\NewsCateController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\NewsCateController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\NewsCateController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\NewsCateController::class, 'delete']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\ProductController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\ProductController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\ProductController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\ProductController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\ProductController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete']);
    });

    Route::group(['prefix' => 'productCate'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\ProductCateController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\ProductCateController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\ProductCateController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\ProductCateController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\ProductCateController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\ProductCateController::class, 'delete']);
    });

    Route::group(['prefix' => 'seo'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\SeoController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\SeoController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\SeoController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\SeoController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\SeoController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\SeoController::class, 'delete']);
    });

    Route::group(['prefix' => 'video'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\VideoController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\VideoController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\VideoController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\VideoController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\VideoController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\VideoController::class, 'delete']);
    });

    Route::group(['prefix' => 'videoCate'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\VideoCateController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\VideoCateController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\VideoCateController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\VideoCateController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\VideoCateController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\VideoCateController::class, 'delete']);
    });
    Route::group(['prefix' => 'platform'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\PlatformController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\PlatformController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\PlatformController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\PlatformController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\PlatformController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\PlatformController::class, 'delete']);
    });

    Route::group(['prefix' => 'message'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\MessageController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\MessageController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\MessageController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\MessageController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\MessageController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\MessageController::class, 'delete']);
    });

    Route::group(['prefix' => 'requestLog'], function () {
        Route::post('/getList', [\App\Http\Controllers\Admin\RequestLogController::class, 'getList']);
        Route::post('/getAll', [\App\Http\Controllers\Admin\RequestLogController::class, 'getAll']);
        Route::post('/getOne', [\App\Http\Controllers\Admin\RequestLogController::class, 'getOne']);
        Route::post('/add', [\App\Http\Controllers\Admin\RequestLogController::class, 'add']);
        Route::post('/save', [\App\Http\Controllers\Admin\RequestLogController::class, 'save']);
        Route::post('/delete', [\App\Http\Controllers\Admin\RequestLogController::class, 'delete']);
    });
});
