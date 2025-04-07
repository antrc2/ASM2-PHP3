<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'home']);


// Category
Route::get("/admin/categories",[CategoryController::class,"index"])->name("admin_categories");
Route::get("/admin/categories/create",[CategoryController::class,"create"])->name("admin_categories_create");
Route::post("/admin/categories/store", [CategoryController::class,"store"])->name("admin_categories_store");
Route::get("/admin/categories/show/{id}",[CategoryController::class,'show'])->name("admin_categories_show");
Route::get("/admin/categories/edit/{id}",[CategoryController::class,'edit'])->name("admin_categories_edit");
Route::put("/admin/categories/update/{id}",[CategoryController::class,'update'])->name("admin_categories_update");
Route::delete("/admin/categories/delete/{id}", [CategoryController::class,'destroy'])->name("admin_categories_delete");

// Product
Route::get("/admin/products",[ProductController::class,'index'])->name("admin_products");
Route::get("/admin/products/create",[ProductController::class,"create"])->name("admin_products_create");
Route::post("/admin/products/store", [ProductController::class,'store'])->name("admin_products_store");
Route::get("/admin/products/edit/{id}",[ProductController::class,'edit'])->name("admin_products_edit");
Route::put("/admin/products/update/{id}",[ProductController::class,'update'])->name("admin_products_update");
Route::delete("/admin/products/delete/{id}",[ProductController::class,'destroy'])->name("admin_products_delete");
Route::post("/admin/products/undo/{id}",[ProductController::class,'undo'])->name("admin_products_undo");
Route::get("/admin/products/show/{id}",[ProductController::class,"show"])->name("admin_products_show");