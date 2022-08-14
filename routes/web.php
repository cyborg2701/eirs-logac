<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_user');


Route::middleware(['is_admin'])->group(function(){
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/admin/profile', 'ProfileController@index')->name('profile');
Route::put('/admin/profile', 'ProfileController@update')->name('profile.update');
Route::get('/admin/about', function () {
    return view('about');
})->name('about');

Route::resource('/admin/employees', EmployeeController::class);
});

Auth::routes();
