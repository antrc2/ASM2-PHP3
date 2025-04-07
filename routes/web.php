<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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
