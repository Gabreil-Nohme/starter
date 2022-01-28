<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Auth::routes();

Route::get('/dashboard',function(){
    return 'dashboard';
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::group(['prefix'=>'offer'],function(){

    Route::post('/store',[CrudController::class,'store'])->name('offer.store');
    Route::get('/create',[CrudController::class,'create'])->name('offer.create');
    Route::get('/all',[CrudController::class,'allOffers'])->name('offer.all');
    Route::get('/edit/{offer_id}',[CrudController::class,'edit_offer'])->name('edit_offer');
    Route::post('/update/{offer_id}',[CrudController::class,'update'])->name('offer.update_offer');

    });

});
