<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PublicController::class, 'welcome']);

// CRUD - AD
Route::get('/create/ad', [AdController::class,'create'])->name('ads.create')->middleware('auth');
Route::post('/store/ad',[AdController::class,'store'])->name('ads.store');
Route::get('/ads', [AdController::class,'index'])->name('ads.index');
Route::get('/ad/{ad}', [AdController::class,'show'])->name('ads.show');
Route::post('/ad/images/upload', [AdController::class,'uploadImages'])->name('ads.uploadImages') ;
Route::get('/ad/images/old', [AdController::class,'getImages'])->name('ads.getImages');
Route::delete('/ad/images/remove', [AdController::class,'removeImage'])->name('ads.removeImage') ;

// CRUD CATEGORIE
Route::get('/detail/category/{category}', [CategoryController::class,'show'])->name('categories.show');


// Rotta per revisori
Route::get('/revisor/home', [RevisorController::class,'index'])->name('revisor.home');
Route::post('/revisor/ad/{id}/accepted', [RevisorController::class,'accept'])->name('revisor.accept');
Route::post('/revisor/ad/{id}/rejected', [RevisorController::class,'reject'])->name('revisor.reject');

// Rotta per search
Route::get('/search', [PublicController::class,'search'])->name('search');
Route::post('/locale/{locale}', [PublicController::class,'locale'])->name('locale');

// Rotta per User
Route::get('/profile', [UserController::class,'profile'])->name('user.profile');
Route::post('/message-revisor', [UserController::class,'messageRevisor'])->name('user.messageRevisor');
