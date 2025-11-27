<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomepageController::class, "index"]);

Route::get("/shop", [ShopController::class, "index"]);

Route::get("/contact", [ContactController::class, "index"]);
Route::post("send-contact", [ContactController::class, "sendContact"]);

Route::view('/about', 'about');


Route::view("/admin/add-product", "admin.addProduct")
    ->name("product.add");
Route::get("/admin/all-products", [ProductController::class, "getAllProducts"])
    ->name("product.all");
Route::get("/admin/delete-product/{product}", [ProductController::class, "deleteProduct"])
    ->name("product.delete");
Route::post("/admin/save-product", [ProductController::class, "saveProduct"])
    ->name("product.save");
Route::get("/admin/edit-product/{product}", [ProductController::class, "editProduct"])
    ->name("product.edit");
Route::post("/admin/update-product/{product}", [ProductController::class, "updateProduct"])
    ->name("product.update");

Route::get("/admin/all-contacts", [ContactController::class, "getAllContacts"])
    ->name("contact.all");
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "deleteContact"])
    ->name("contact.delete");
Route::get("/admin/edit-contact/{contact}", [ContactController::class, "editContact"])
    ->name("contact.edit");
Route::post("/admin/update-contact/{contact}", [ContactController::class, "updateContact"])
    ->name("contact.update");
