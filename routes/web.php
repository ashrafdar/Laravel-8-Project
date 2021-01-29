<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () 
// {
//     return view('welcome');
// });

//Route::resource('games/create', 'GameController');

//Route::get('/games', [GameController::class, 'create']);
Route::resource('/products', ProductController::class);
//Route::resource('dashboard', ProductController::class,'dashboard');
//Route::get('/', [ProductController::class, 'dashboard']);
//Route::get('/dashboard', [ProductController::class, 'dashboard']);
Route::get('/', [AdminController::class, 'dashboard']);
Route::get('admin/packages', [AdminController::class, 'packages']);
Route::get('/flights', [AdminController::class, 'flights']);
Route::get('/customers', [AdminController::class, 'customers']);
Route::get('/sales', [AdminController::class, 'sales']);
Route::get('/purchase', [AdminController::class, 'purchase']);
//Route::resource('admin', AdminController::class);


