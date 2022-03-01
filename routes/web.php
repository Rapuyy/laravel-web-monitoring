<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/camera', [HomeController::class, 'camera'])->name('camera');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});

Route::group(['middleware' => 'role:1'], function () {
    Route::group(['prefix' => 'management'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/add', [UserController::class, 'showAdminRegister'])->name('user.add');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/add', [UserController::class, 'adminRegister'])->name('user.register');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
});