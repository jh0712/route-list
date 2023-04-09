<?php

use Illuminate\Support\Facades\Route;
use Lkh\RouteList\Controller\RouteListController;
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

//Route::get('/route-view', function () {
//    return view('routelist::index');
//});
Route::group(['prefix' => 'route-view', 'as' => 'route-view.'], function () {
    Route::get('/', [RouteListController::class, 'index'])->name('index');
    Route::get('/getRouteListData', [RouteListController::class, 'getRouteListData'])->name('getRouteListData');
});
