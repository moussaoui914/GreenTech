<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportDataController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index'])->name('homePage');
Route::get('productDetials/{id}', [ProduitController::class, 'afficherDetails'])->name('productDetails');
Route::get('my_search', [ProduitController::class, 'my_search'])->name('search');


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/favoris', [FavoriController::class, 'index'])->name('favoris.index');
    Route::post('/favoris/{produit}/toggle', [FavoriController::class, 'toggle'])->name('favoris.toggle');
    Route::delete('/favoris/{produit}', [FavoriController::class, 'destroy'])->name('favoris.destroy');
    
    // Route::middleware('admin')->group(function () {

    Route::get('usersList', [UserController::class, 'showUsers'])->name('usersList.index');
    Route::post('affectRole',[RoleController::class,'assignRole'])->name('users.assign.role');
    Route::get('usersForm', [UserController::class, 'showUserForm'])->name('users.index');
    Route::post('usersForm/store', [UserController::class, 'store'])->name('user.store');
    Route::get('editUser/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('editUser/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
    
    Route::get('roleForm', [RoleController::class, 'showRoleForm'])->name('role.index');
    Route::post('roleForm', [RoleController::class, 'store'])->name('role.store');
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

        
    // Permissions
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/assign', [PermissionController::class, 'assign'])->name('assign');
        Route::get('/role/{role}', [PermissionController::class, 'show'])->name('permissions.show');

    });



        Route::get('admin_dashboard', [AdminController::class, 'show_Admin_Dashboard'])->name('admin.dashboard');
        
        Route::get('createForm', [ProduitController::class, 'ajouterProduit'])->name('product.create');
        Route::post('product/store', [ProduitController::class, 'store'])->name('product.store');
        Route::get('editForm/{id}', [ProduitController::class, 'edit'])->name('product.edit');
        Route::put('editForm/{id}', [ProduitController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProduitController::class, 'destroy'])->name('product.destroy');
    });

    Route::get('/products/export', [ExportDataController::class, 'export'])->name('products.export');
// });