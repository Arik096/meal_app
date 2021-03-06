<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('welome');

Route::group(['prefix' => 'admin/', 'middleware' => ['role:superadmin']], function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashborad');
    Route::post('userStore', 'AdminController@store')->name('userStore');
    Route::post('EntryTimeStore', 'EntryTimeController@store')->name('EntryTimeStore');

});

Route::group(['prefix' => 'user/', 'middleware' => ['role:hr|account|staff']], function () {
    Route::get('dashboard', 'UserController@dashboard')->name('userDashborad');
    Route::post('dashboard', 'MealController@store')->name('mealStore');

});
