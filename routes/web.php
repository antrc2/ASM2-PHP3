<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get("/",[PageController::class,'home'])->name("page_home");
Route::get("/product/{id}",[PageController::class,'detail'])->name("page_product_detail");
Route::get('/category/{id}',[PageController::class,'category'])->name("page_category_detail");
Route::get("/login",[AccountController::class,'login'])->name("login");
Route::post("/login",[AccountController::class,'login'])->name("login");
Route::get("/forbidden",[PageController::class,'forbidden'])->name("page_forbidden");
Route::middleware('user')->group(function(){
    Route::get("/logout",[AccountController::class,'logout'])->name("logout");
});
// Category
Route::middleware(["auth", 'admin'])->prefix('admin')->group(function () {
    Route::get("/categories", [CategoryController::class, "index"])->name("admin_categories");
    Route::get("/categories/create", [CategoryController::class, "create"])->name("admin_categories_create");
    Route::post("/categories/store", [CategoryController::class, "store"])->name("admin_categories_store");
    Route::get("/categories/show/{id}", [CategoryController::class, 'show'])->name("admin_categories_show");
    Route::get("/categories/edit/{id}", [CategoryController::class, 'edit'])->name("admin_categories_edit");
    Route::put("/categories/update/{id}", [CategoryController::class, 'update'])->name("admin_categories_update");
    Route::delete("/categories/delete/{id}", [CategoryController::class, 'destroy'])->name("admin_categories_delete");
    Route::post("/categories/undo/{id}", [CategoryController::class, 'undo'])->name("admin_categories_undo");
    Route::get("/products", [ProductController::class, 'index'])->name("admin_products");
    Route::get("/products/create", [ProductController::class, "create"])->name("admin_products_create");
    Route::post("/products/store", [ProductController::class, 'store'])->name("admin_products_store");
    Route::get("/products/edit/{id}", [ProductController::class, 'edit'])->name("admin_products_edit");
    Route::put("/products/update/{id}", [ProductController::class, 'update'])->name("admin_products_update");
    Route::delete("/products/delete/{id}", [ProductController::class, 'destroy'])->name("admin_products_delete");
    Route::post("/products/undo/{id}", [ProductController::class, 'undo'])->name("admin_products_undo");
    Route::get("/products/show/{id}", [ProductController::class, "show"])->name("admin_products_show");
    Route::view("/dashboard", "admin.page.dashboard");
});


