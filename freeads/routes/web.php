<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/////////////////////////////////////////////////////////////

//CRUD users :

Route::get("/users", [UserController::class, "index"])->middleware(['admin'])->name("users.index");

Route::get("/users/show/{id}", [UserController::class, "show"])->name("users.show");

Route::post("/users/makeAdmin/{id}", [UserController::class, "makeAdminThisUser"])->name("users.makeAdmin");

Route::post("/users/makeNotAdmin/{id}", [UserController::class, "makeNotAdminThisUser"])->name("users.makeNotAdmin");

Route::post("/users/delete/{id}", [UserController::class, "delete"])->name("users.delete");

/////////////////////////////////////////////////////////////

//CRUD ads :

Route::get("/products", [AdsController::class, "index"])->middleware(['auth']);

Route::get("/products/show/{id}", [AdsController::class, "show"])->middleware(['auth'])->name("product.show");

Route::get("/products/add", [AdsController::class, "form"])->middleware(['auth']);

Route::post("/products/validate", [AdsController::class, "validAdd"])->name("products.validate");

Route::get("/products/edit/{id}", [AdsController::class, "edit"])->middleware(['auth'])->name("product.edit");

Route::get("/products/delete/{id}", [AdsController::class, "delete"])->middleware(['auth'])->name("product.delete");

Route::get("/products/validDelete/{id}", [AdsController::class, "validDelete"])->middleware(['auth'])->name("product.validDelete");

Route::post("/products/validEdit/{id}", [AdsController::class, "validEdit"])->middleware(['auth'])->name("product.validEdit");

Route::post("/products/search", [AdsController::class, "search"])->middleware(['auth'])->name("product.search");

require __DIR__.'/auth.php';
