<?php

use App\Models\Student;
use Database\Seeders\StudentSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ViolationController;

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
    return view('auth.login');
});

Auth::routes();

// Student
Route::prefix('student')->controller(StudentController::class)->name('student.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/data', 'data')->name('data');
    Route::get('/detail/{nisn}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/violation', 'violation_index')->name('violation.index');
});

Route::prefix('violation')->controller(ViolationController::class)->name('violation.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/data', 'data')->name('data');
});

Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/data', 'data')->name('data');
    
    Route::get('/create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
