<?php

use App\Http\Controllers\Page\CategoryController;
use App\Http\Controllers\Page\CompanyController;
use App\Http\Controllers\Page\ConfigController;
use App\Http\Controllers\Page\DashboardController;
use App\Http\Controllers\Page\ProductController;
use App\Http\Controllers\Page\SubcategoryController;
use App\Http\Controllers\Page\SuggestedController;
use App\Http\Controllers\Page\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('page.guest.home');
});

Route::get('/unrole', [DashboardController::class, 'unrole'])->name('dashboard.unrole');
Route::post('/unrole', [DashboardController::class, 'unrole'])->name('dashboard.unrole');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','is_master', 'is_unrole'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'is_unrole'])->group(function () {
    

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    // Route::get('/categories/{category}/subcategories', [SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    // Route::get('/categories/{category}/subcategories/{subcategory}/product', [ProductController::class, 'show'])->name('product.show');
    Route::get('/suggesteds', [SuggestedController::class, 'index'])->name('suggesteds.index');
    Route::get('/config/{company}', [ConfigController::class, 'index'])->name('config.index');
});

// Route::view('/puerto_tabla', 'livewire.site.puertotabla.home-index');
Route::get('/puerto_tabla', [DashboardController::class, 'puerto_tabla'])->name('puerto_tabla.index');
