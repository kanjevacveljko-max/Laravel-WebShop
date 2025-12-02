<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopingCartController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, "index"])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/shop", [ShopController::class, "index"]);

Route::view('/about', 'about');

Route::get("/products/{product}", [ProductController::class, "permalink"])->name('product.permalink');

Route::post("/cart/add", [ShopingCartController::class, "addToCart"])->name('cart.add');
Route::get("/cart", [ShopingCartController::class, "showCart"])->name('cart.show');
//ADMIN RUTE

Route::middleware(['auth', AdminCheck::class])->prefix("/admin")->group(function () {

    Route::view("/add-product", "admin.addProduct")
        ->name("product.add");

    Route::controller(ProductController::class)->prefix("/product")->name("product.")->group(function () {

        Route::get("/all", "getAllProducts")->name("all");
        Route::get("/delete/{product}", "deleteProduct")->name("delete");
        Route::post("/save", "saveProduct")->name("save");
        Route::get("/edit/{product}", "editProduct")->name("edit");
        Route::post("/update/{product}", "updateProduct")->name("update");
    });


    Route::controller(ContactController::class)->prefix("/contact")->name("contact.")->group(function() {

        Route::get("/", "index");
        Route::get("/all", "getAllContacts")->name("all");
        Route::get("/delete/{contact}", "deleteContact")->name("delete");
        Route::get("/edit/{contact}", "editContact")->name("edit");
        Route::post("/update/{contact}", "updateContact")->name("update");
        Route::post("/send", "sendContact")->name("send");
    });

});

require __DIR__ . '/auth.php';
