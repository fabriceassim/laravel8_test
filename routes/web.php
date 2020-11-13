<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
Route::group(['middleware' => 'web'], function () {
	Route::get('/', function () {
        return view('index');
    })->name('main');
	//Route::get('/admin', [AppController::class, 'getAdminPage']);
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
    
    //Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit');
});