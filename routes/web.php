<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\StatisticsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'registerForm'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('store');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home',[DashboardController::class,'index']);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/employees',[EmployeesController::class,'index'])->name('employees');
    
    Route::get('/create-employees', [EmployeesController::class, 'create'])->name('create-employees');
    Route::post('/create-employees', [EmployeesController::class, 'store'])->name('store-employees');
    
    Route::get('/show-employees/{id}', [EmployeesController::class, 'show'])->name('show-employees');
    
    Route::get('/edit-employees/{id}', [EmployeesController::class, 'edit'])->name('edit-employees');
    Route::post('/edit-employees/{id}', [EmployeesController::class, 'update'])->name('update-employees');
    Route::post('/delete-employees/{id}', [EmployeesController::class, 'destroy'])->name('delete-employees');
    
    Route::get('/statistics',[StatisticsController::class,'index'])->name('statistics');

});

