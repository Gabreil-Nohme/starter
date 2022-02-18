<?php

use App\Http\Controllers\Auth\CustomAuthcontroller;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ListenController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Relation\RelationController;
use Illuminate\Routing\Route as RoutingRoute;
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

Auth::routes(['verify'=>false]);//true <----

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')/*->middleware('verified')*/;

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

    Route::middleware(['middlware'=>'auth'])->group(function () {


    Route::match(['get','post'],'/store',[CrudController::class,'store'])->name('offer.store');
    Route::get('/create',[CrudController::class,'create'])->name('offer.create');
    Route::get('/all',[CrudController::class,'allOffers'])->name('offer.all');
    Route::get('/edit/{offer_id}',[CrudController::class,'edit_offer'])->name('edit_offer');
    Route::post('/update/{offer_id}',[CrudController::class,'update'])->name('offer.update_offer');
    Route::match(['get','post'],'/delete/{offer_id}',[CrudController::class,'destroy'])->name('offer.destroy');
    Route::get('/youtube',[ListenController::class,'get_vedio'])->name('video.view');
    });
    });

});

Route::group(['prefix'=>'ajax-offer'],function(){
    Route::get('/create',[OfferController::class,'create'])->name('ajax-offer.create');
    Route::post('/store',[OfferController::class,'store'])->name('ajax-offer.store');
    Route::get('/all',[OfferController::class,'all'])->name('ajax-offer.all');

});
Route::group(['namespase'=>'Auth'],function(){
    Route::group(['middleware'=>'ChekAge'],function(){
    Route::get('/adults',[CustomAuthcontroller::class,'adults']);
    Route::get('/site',[CustomAuthcontroller::class,'site']);
    });
    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/admin',[CustomAuthcontroller::class,'admin']);

    });
});

Route::get('/adminlogin',[CustomAuthcontroller::class,'adminlogin'])->name('adminlogin');
Route::post('/adminloginch',[CustomAuthcontroller::class,'CheckaAminLogin'])->name('CheckaAminLogin');

######################### relations
Route::get('/relations',[RelationController::class,'hasOne'])->name('hasOne');
Route::get('/relationss',[RelationController::class,'hasOneP'])->name('hasOneP');

Route::get('/Manyhospitals',[RelationController::class,'hospitalshasMany'])->name('hasMany');
Route::get('/viewHospitals',[RelationController::class,'viewHospitals'])->name('viewHospitals');
Route::get('/viewDoctors/{h_id}',[RelationController::class,'viewDoctors'])->name('viewDoctors');
Route::get('/deleteHospital/{h_id}',[RelationController::class,'deleteHospital'])->name('deleteHospital');
Route::get('/get-Doctor-Service',[RelationController::class,'getDoctorService'])->name('getDoctorService');
Route::get('/get-Service-Doctor',[RelationController::class,'getServiceDoctor'])->name('getServiceDoctor');


Route::get('/whereHasDoctors',[RelationController::class,'whereHasDoctors'])->name('whereHasDoctors');
Route::get('/HasMaleDoctor',[RelationController::class,'HasMaleDoctor'])->name('HasMaleDoctor');
Route::get('/NotHasDoctor',[RelationController::class,'NotHasDoctor'])->name('NotHasDoctor');


