<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MasterlistController;


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
    return view('auth/login');
});


Route::get('home', [HomeController::class, 'index'])->name('user.home')->middleware('is_user');
Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::group(['prefix' => 'employees', 'middleware' => ['is_user']], function(){
    Route::get('', [MasterlistController::class, 'index'])->name('employees.index');
    Route::post('store', [MasterlistController::class, 'store'])->name('employees.store');
    Route::get('edit', [MasterlistController::class, 'edit'])->name('employees.edit');
    Route::get('show', [MasterlistController::class, 'show'])->name('employees.show');
    Route::post('update', [MasterlistController::class, 'update'])->name('employees.update');
    Route::delete('destroy', [MasterlistController::class, 'destroy'])->name('employees.destroy');
    Route::get('reports', [MasterlistController::class, 'report'])->name('employees.report');
});

Route::group(['prefix' => 'admin/masterlist', 'middleware' => ['is_admin']], function(){

    Route::get('', [EmployeeController::class, 'index'])->name('admin.index');
    Route::post('store', [EmployeeController::class, 'store'])->name('admin.store');
    Route::get('edit', [EmployeeController::class, 'edit'])->name('admin.edit');
    Route::post('update', [EmployeeController::class, 'update'])->name('admin.update');
    Route::get('show', [EmployeeController::class, 'show'])->name('admin.show');
    Route::delete('destroy', [EmployeeController::class, 'destroy'])->name('admin.destroy');
    Route::get('reports', [EmployeeController::class, 'report'])->name('admin.report');

    Route::get('/admin/profile', 'ProfileController@index')->name('profile');
    Route::put('/admin/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/admin/about', function () {
        return view('about');
            })->name('about');
    
});
Auth::routes();
