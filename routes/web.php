<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [ProductController::class, 'index'])->name('accueil');
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

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/del/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/upd/{id}', [CartController::class, 'edit'])->name('cart.edit');

//route pour finaliser info de la commande
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
//route commande complété
Route::get('/order/complete', [OrderController::class, 'index'])->name('order.complete');
});

require __DIR__.'/auth.php';
