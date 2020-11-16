<?php

use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\LazyCollection;


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



Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::group(['namespace' => 'BackHome'] , function (){
   Route::post('/user/check' , 'HomeController@checkUser')->name('user-check');
});

Route::group(['namespace' =>'FrontHome'] ,function (){

    Route::get('home', 'HomeController@index')->name('home');
    Route::post('postpo' , 'HomeController@postpo');

    Route::get('/redirect/{driver}' , 'DriverController@getDriver')->name('goToServiceDriver');
    Route::get('/redirect/callback/{driver}' , 'DriverController@getDriverCallBack')->name('goToServiceDriver');

});


