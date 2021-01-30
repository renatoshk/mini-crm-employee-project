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
//set route for switch languange
    Route::redirect('/', '/en');
	Route::group(['prefix'=>'{languange}','where'=>['languange'=>'[a-zA-Z]{2}'], 'middleware' =>'setlanguage'], function(){
	Route::get('/', function () {
	    return view('auth.login');
	})->name('homeLogin');
	Auth::routes(['register'=>false]);
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	//middleware Admin for admin routes
	Route::group(['middleware'=>'admin'], function(){
		   Route::get('/adm', [App\Http\Controllers\AdminController::class, 'index'])->name('adm');
		   Route::resource('/adm/companies', 'App\Http\Controllers\AdminCompaniesController');
		   Route::resource('/adm/employee', 'App\Http\Controllers\AdminEmployeesController');
	});
});

