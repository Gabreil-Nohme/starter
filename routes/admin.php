<?php

use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\TestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return "hello";
});

Route::namespace('Front')->group(function(){

   // Route::get('/ttt',[TestController::class, 'show']);

});
Route::group(['middleware'=>'auth'],function(){
Route::get('/test2',function(){
    return "test2";
});

});

//Route::get('/login',function(){
   //  return "please login";
//})->name('login');

Route::resource('/news',NewsController::class);

