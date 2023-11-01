<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
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


    Route::get('permission', [PermissionController::class, 'index'])->name('permission');
    Route::get('create-permissions', [PermissionController::class, 'create'])->name('create-permission');
    Route::post('create-permissions', [PermissionController::class, 'store'])->name('store-permission');
    Route::get('edit-permissions/{permissions}', [PermissionController::class, 'edit'])->name('edit-permission');
    Route::put('update-permissions/{permissions}', [PermissionController::class, 'update'])->name('update-permission');
    Route::delete('delete-permissions/{permission}', [PermissionController::class, 'destroy'])->name('delete-permission');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
