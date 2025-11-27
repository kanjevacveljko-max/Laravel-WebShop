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


Route::get("/admin/all-products", [ProductController::class, "getAllProducts"]);
Route::get("/admin/delete-product/{product}", [ProductController::class, "deleteProduct"]);
Route::post("/admin/save-product", [ProductController::class, "saveProduct"]);
Route::view("/admin/add-product", "admin.addProduct");

Route::get("/admin/all-contacts", [ContactController::class, "getAllContacts"]);
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "deleteContact"]);
