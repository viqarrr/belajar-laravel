<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
>>>>>>> a11b81b12 (CRUD Products)
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/products', ProductController::class);
});

require __DIR__.'/auth.php';
>>>>>>> a11b81b12 (CRUD Products)
