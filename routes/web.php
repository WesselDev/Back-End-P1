<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Models\Dish;
use App\Http\Controllers\ContactController;



Route::middleware(['auth'])->group(function () {
    Route::resource('/dishes', DishController::class);
});


Route::get('/', function () {
    return view('pages.home'); // ✅ Nu wordt je eigen home geladen
})->name('home');

Route::get('/menu', function () {
    $dishes = Dish::all();
    return view('pages.menu', compact('dishes'));
})->name('menu');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/admin/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::delete('/admin/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
