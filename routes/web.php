<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

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

// Registration view route
Route::get('/register',[RegistrationController::class, 'create']);

// user registration
Route::post('/register',[RegistrationController::class, 'store']);

// show login form
Route::get('/login',[LoginController::class, 'showLoginForm']);

// login
Route::post('/login',[LoginController::class, 'login']);
