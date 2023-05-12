<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('accueil ');
    //filtre par categorie
Route::get('/filtre/{categorie}', [ProductController::class, 'index'])->name('filtre.categorie');
    //detail
Route::get('/detail/{product}', [ProductController::class, 'detail'])->name('accueil.detail');
 



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       //detail (ne peuvent ajouter au panier que les utilisateurs connectés)
Route::get('/addtocart/{product}', [CartController::class, 'add'])->name('addtocart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
});

require __DIR__.'/auth.php';
