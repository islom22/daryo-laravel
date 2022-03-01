<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('news');
});
 
Auth::routes();

Route::get('/admin',[AdminController::class, 'index'])->middleware('auth');
Route::get('/add-refrence',[AdminController::class, 'create']);
Route::post('/add-refrence',[AdminController::class, 'store']);
Route::get('/edit-refrence/{id}',[AdminController::class, 'edit']);
Route::put('/update-refrence/{id}',[AdminController::class, 'update']);
Route::delete('/delete-refrence/{id}',[AdminController::class, 'destroy'])->name('delete');
Route::get('/main',[AdminController::class, 'main']);

Route::get('/category',[CategoryController::class, 'index']);
Route::get('/add-category',[CategoryController::class, 'create']);
Route::post('/add-category',[CategoryController::class, 'store']);
Route::get('/edit-category/{id}',[CategoryController::class, 'edit']);
Route::put('/update-category/{id}',[CategoryController::class, 'update']);
Route::delete('/delete-category/{id}',[CategoryController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{category_id}',[AdminController::class, 'main']);
Route::get('/shows/{id}',[AdminController::class, 'shows']);

