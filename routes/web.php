<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/shop", [ShopController::class, "index"]);

Route::get("/contact", [ContactController::class, "index"]);
Route::post("/admin/send-contact", [ContactController::class, "sendContact"]);

Route::view('/about', 'about');


Route::middleware(['auth', AdminCheck::class])->prefix("admin")->group(function () {

    Route::view("/add-product", "admin.addProduct")
        ->name("product.add");
    Route::get("/all-products", [ProductController::class, "getAllProducts"])
        ->name("product.all");
    Route::get("/delete-product/{product}", [ProductController::class, "deleteProduct"])
        ->name("product.delete");
    Route::post("/save-product", [ProductController::class, "saveProduct"])
        ->name("product.save");
    Route::get("/edit-product/{product}", [ProductController::class, "editProduct"])
        ->name("product.edit");
    Route::post("/update-product/{product}", [ProductController::class, "updateProduct"])
        ->name("product.update");

    Route::get("/all-contacts", [ContactController::class, "getAllContacts"])
        ->name("contact.all");
    Route::get("/delete-contact/{contact}", [ContactController::class, "deleteContact"])
        ->name("contact.delete");
    Route::get("/edit-contact/{contact}", [ContactController::class, "editContact"])
        ->name("contact.edit");
    Route::post("/update-contact/{contact}", [ContactController::class, "updateContact"])
        ->name("contact.update");
    Route::post("/send-contact", [ContactController::class, "sendContact"])
        ->name("contact.send");

});

require __DIR__ . '/auth.php';
