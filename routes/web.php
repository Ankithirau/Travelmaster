<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes();
// Auth::routes();

Auth::routes(['register' => false]);
// Auth::routes(['verify' => true]);

/* Route Dashboards */
// Route::group(['prefix' => 'dashboard'], function () {
//     Route::get('analytics', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard-analytics');
//     Route::get('ecommerce', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');
// });


// Route::get('/', [StaterkitController::class, 'home'])->name('home');
// Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');

/* Route Apps */
Route::group(['middleware' => 'auth','prefix' => 'app'], function () {
    Route::get('/home', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');
    Route::resource('/county', App\Http\Controllers\CountyController::class);
    Route::get('/county-status/{id}', [App\Http\Controllers\CountyController::class, 'status'])->name('county.status');
    Route::resource('/route', App\Http\Controllers\RouteController::class);
    Route::resource('/pickup-point', App\Http\Controllers\PickuppointController::class);
    Route::get('/pickup-point-status/{id}', [App\Http\Controllers\PickuppointController::class, 'status'])->name('pickup-point.status');
    Route::resource('/bus', App\Http\Controllers\BusController::class);
    Route::resource('/banner', App\Http\Controllers\SliderController::class);
    Route::get('/banner-status/{id}', [App\Http\Controllers\SliderController::class, 'status'])->name('banner.status');
    Route::resource('/coupon', App\Http\Controllers\CouponController::class);
    Route::resource('/seo', App\Http\Controllers\SeoController::class);
    Route::resource('/ticket', App\Http\Controllers\BookingController::class);
    Route::get('/attendee-info/{id}', [App\Http\Controllers\BookingController::class, 'attendee_info'])->name('attendee.info');
    Route::get('county-list', [CountyController::class, 'county_list'])->name('app-county-list');
    Route::resource('/event', App\Http\Controllers\ProductController::class);
    Route::get('user/list', [AppsController::class, 'user_list'])->name('app-user-list');
    Route::get('user/view', [AppsController::class, 'user_view'])->name('app-user-view');
    Route::get('user/edit', [AppsController::class, 'user_edit'])->name('app-user-edit');
});
/* Route Apps */
// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
