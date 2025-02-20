<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\Commentcontroller;
use App\Http\Controllers\claimsControler;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     // ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/dashboard', [AnnonceController::class, 'index'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');

Route::post('/annonce', [AnnonceController::class, 'store'])->name('annonce.store');

Route::get('/annonce/form', [AnnonceController::class, 'form'])->name('annonce.form');

Route::get('/annonce/index', [AnnonceController::class, 'index'])->name('annonce.index');

Route::get('/annonce/detaile/{id}', [AnnonceController::class, 'getDetaile'])->name('annonce.detaile');

Route::post('/Comment', [Commentcontroller::class, 'poster'])->name('comment.poster');

Route::get('Comment/detaile/{id}', [CommentController::class, 'show'])->name('annonce.show');

Route::get('/Comment/index', [CommentController::class, 'index'])->name('Comment.index');

Route::post('/Comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/Comment/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit');

Route::post('/Comment/update/{id}', [CommentController::class, 'update'])->name('comment.update');

Route::get('/annonce/MesAnnonce', [AnnonceController::class, 'MesAnnonce'])->name('annonce.MesAnnonce');

Route::get('/annonce/delete/{id}', [AnnonceController::class, 'delete'])->name('annonce.delete');

Route::post('/annonce/update/{id}', [AnnonceController::class, 'update'])->name('annonce.update');

Route::get('/annonce/editeAnnonce/{id}', [AnnonceController::class, 'editeAnnonce'])->name('annonce.editeAnnonce');

Route::post('/Claims/found', [claimsControler::class, 'found'])->name('Claims.found');

Route::post('/Claims/lost', [claimsControler::class, 'lost'])->name('Claims.lost');


require __DIR__ . '/auth.php';
