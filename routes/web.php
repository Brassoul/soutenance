<?php

use App\Models\Cathegorie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\commandecontroller;
use App\Http\Controllers\avieclientcontroller;
use App\Http\Controllers\CathegorieController;

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

Route::get('/', function () {
    return view('site.index');
})->name('site.index');

// Route::get('/shop', function () {
//     return view('site.shop');
// })->name('site.shop');


Route::get('shop',[ ProduitController::class,'shop'])->name('site.shop');


Route::get('/shop-detail', function () {
    return view('site.shop_detail');
})->name('site.shop_detail');


Route::get('site.shop-detail/{id}',[ ProduitController::class,'shop_detail'])->name('produits.shop_detail');


Route::get('/contact', function () {
    return view('site.contact');
})->name('site.contact');

Route::get('/cart', function () {
    return view('site.cart');
 })->name('site.cart');

Route::get('cart',[ CartController::class,'cart'])->name('site.cart');
Route::get('add-cart/{produitID}',[ CartController::class,'AddCart'])->name('add.cart');
Route::get('Add-quantity/{produitID}',[ CartController::class,'Addquantity'])->name('Add.quantity');
Route::get('decrease-quantity/{produitID}',[ CartController::class,'decreasequantity'])->name('decrease.quantity');
Route::get('remove-produit/{produitID}',[ CartController::class,'remove'])->name('remove.produit');
Route::get('clear/cart',[ CartController::class,'clearCart'])->name('clear.cart');


Route::get('/testimonial', function () {
    return view('site.testimonial');
})->name('site.testimonial');

Route::get('/chackout', function () {
    return view('site.chackout');
})->name('site.chackout');



Route::get('/layout', function () {
    return view('layoutes.layout');
});

//route payement
Route::get('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment', [PaymentController::class, 'handlePayment'])->name('payment.handle');

Route::get('/confirmation', [PaymentController::class, 'showConfirmation'])->name('payment.confirmation');











// controller cathegorie
Route::get('cathegories',[ CathegorieController::class,'index'])->name('cathegories.index');
Route::get('cathegories/create',[ CathegorieController::class,'create'])->name('cathegories.create');
Route::post('cathegories/store',[ CathegorieController::class,'store'])->name('cathegories.store');
Route::get('cathegories/show/{id}',[ CathegorieController::class,'show'])->name('cathegories.show');
Route::get('cathegories/edit/{id}',[ CathegorieController::class,'edit'])->name('cathegories.edit');
Route::put('cathegories/update/{id}',[ CathegorieController::class,'update'])->name('cathegories.update');
Route::delete('cathegories/delete/{id}',[ CathegorieController::class,'destroy'])->name('cathegories.delete');


// controller produit
Route::get('produits',[ ProduitController::class,'index'])->name('produits.index');
Route::get('produits/create',[ ProduitController::class,'create'])->name('produits.create');
Route::post('produits/store',[ ProduitController::class,'store'])->name('produits.store');
Route::get('produits/show/{id}',[ ProduitController::class,'show'])->name('produits.show');
Route::get('produits/edit/{id}',[ ProduitController::class,'edit'])->name('produits.edit');
Route::put('produits/update/{id}',[ ProduitController::class,'update'])->name('produits.update');
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.delete');


// controller commentaire
Route::get('aviecliients',[ avieclientcontroller::class,'index'])->name('aviecliients.index');
Route::get('avieclients/create',[ avieclientcontroller::class,'create'])->name('avieclients.create');
Route::post('avieclients/store',[ avieclientcontroller::class,'store'])->name('avieclients.store');
Route::get('avieclients/show/{id}',[ avieclientcontroller::class,'show'])->name('avieclients.show');
Route::get('avieclients/edit/{id}',[ avieclientcontroller::class,'edit'])->name('avieclients.edit');
Route::put('avieclients/update/{id}',[ avieclientcontroller::class,'update'])->name('avieclients.update');
Route::delete('avieclients/delete/{id}',[ avieclientcontroller::class,'destroy'])->name('avieclients.delete');


// controller commande
Route::get('commandes',[ commandecontroller::class,'index'])->name('commandes.index');
Route::get('commandes/create',[ commandecontroller::class,'create'])->name('commandes.create');
Route::post('commandes/store',[ commandecontroller::class,'store'])->name('commandes.store');
Route::get('commandes/show/{id}',[ commandecontroller::class,'show'])->name('commandes.show');
Route::get('commandes/edit/{id}',[ commandecontroller::class,'edit'])->name('commandes.edit');
Route::put('commandes/update/{id}',[ commandecontroller::class,'update'])->name('commandes.update');
Route::delete('commandes/delete/{id}',[ commandecontroller::class,'destroy'])->name('commandes.delete');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
