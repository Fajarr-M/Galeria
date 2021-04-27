<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ContactController;
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

Auth::routes([
    'register' => false,
    'reset' => false,
    ]);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    //Route Guest
    Route::get('/', [GuestController::class, 'index']);
    Route::get('/detail-album/{title}', [GuestController::class, 'galerifoto'])->name('galeri.foto');
    Route::get('/like-foto/{id}', [GuestController::class, 'likefoto'])->name('like.foto');

    // Route Album
    Route::get('/album', [AlbumController::class, 'index']);
    Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/album/edit/{id}', [AlbumController::class, 'edit'])->name('album.edit');
    Route::post('/album/update/{id}', [AlbumController::class, 'update'])->name('album.update');
    Route::post('/album/destroy/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
    
    //Route Galeri
    Route::get('/galeri', [GaleriController::class, 'index']);
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::post('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::post('/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    
    
    //Route User
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/delete{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
    //Email
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
    