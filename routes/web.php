<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\ReportController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::get('create-roles', [RoleController::class, 'create'])->name('create-role');
    Route::post('create-roles', [RoleController::class, 'store'])->name('store-role');
    Route::get('edit-roles/{roles}', [RoleController::class, 'edit'])->name('edit-role');
    Route::put('update-roles/{roles}', [RoleController::class, 'update'])->name('update-role');
    Route::delete('delete-roles/{role}', [RoleController::class, 'destroy'])->name('delete-role');
    Route::post('give-permission/{role}/permissions', [RoleController::class, 'givePermission'])->name('add-role-permission');
    Route::delete('give-permission/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('delete-role-permission');


    Route::get('permission', [PermissionController::class, 'index'])->name('permission');
    Route::get('create-permissions', [PermissionController::class, 'create'])->name('create-permission');
    Route::post('create-permissions', [PermissionController::class, 'store'])->name('store-permission');
    Route::get('edit-permissions/{permissions}', [PermissionController::class, 'edit'])->name('edit-permission');
    Route::put('update-permissions/{permissions}', [PermissionController::class, 'update'])->name('update-permission');
    Route::delete('delete-permissions/{permission}', [PermissionController::class, 'destroy'])->name('delete-permission');


    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('create-user', [UserController::class, 'create'])->name('create-user');
    Route::post('create-user', [UserController::class, 'store'])->name('store-user');
    Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('edit-user');
    Route::put('update-user/{user}', [UserController::class, 'update'])->name('update-user');
    Route::delete('delete-user/{user}', [UserController::class, 'destroy'])->name('delete-user');
    Route::post('user/{user}/roles', [UserController::class, 'giveRole'])->name('add-role-user');
    Route::delete('user/{user}/roles/{role}', [UserController::class, 'revokeRole'])->name('delete-role-user');
    Route::post('user/{user}/permissions', [UserController::class, 'givePermission'])->name('add-user-permission');
    Route::delete('user/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('delete-user-permission');


    Route::get('sale', [SaleController::class, 'index'])->name('sale');
    Route::get('create-sale', [SaleController::class, 'create'])->name('create-sale');
    Route::post('create-sale', [SaleController::class, 'store'])->name('store-sale');
    Route::get('edit-sale/{sale}', [SaleController::class, 'edit'])->name('edit-sale');
    Route::put('update-sale/{sale}', [SaleController::class, 'update'])->name('update-sale');
    Route::get('view-sale/{sale}', [SaleController::class, 'view'])->name('view-sale');


    Route::get('monthly-report', [ReportController::class, 'viewMonthly'])->name('monthly-report');
    Route::get('yearly-report', [ReportController::class, 'viewYearly'])->name('yearly-report');
    Route::get('yearly-Brand-report', [ReportController::class, 'viewBrandYearly'])->name('yearly-Brand-report');
    Route::get('export-report', [ReportController::class, 'exportReport'])->name('export-report');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
