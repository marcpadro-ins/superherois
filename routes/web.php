<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/languages', [LangController::class, 'index'])->name('langs.index');
Route::get('/languages/create', [LangController::class, 'create'])->name('langs.create');
Route::post('/languages', [LangController::class, 'store'])->name('langs.store');
Route::get('/languages/{lang}', [LangController::class, 'show'])->name('langs.show');
Route::get('/languages/{lang}/edit', [LangController::class, 'edit'])->name('langs.edit');
Route::put('/languages/{lang}', [LangController::class, 'update'])->name('langs.update');
Route::delete('/languages/{lang}', [LangController::class, 'destroy'])->name('langs.destroy');

Route::get('/translate', [CategoryController::class, 'translate'])->name('translate.translate');
Route::post('/translate', [CategoryController::class, 'storeTranslate'])->name('translate.store');
Route::delete('/translate/{category}/{lang}', [CategoryController::class, 'destroyTranslate'])->name('translate.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
