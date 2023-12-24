<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SalesFileTypeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ExpensesTypeController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\PaymentPlanController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ShippingReminderController;
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
    Route::get('createFile-sale/{sale}', [SaleController::class, 'createFile'])->name('createFile-sale');
    Route::post('storeFile-sale/{sale}', [SaleController::class, 'storeFile'])->name('storeFile-sale');
    Route::get('viewFile-sale/{sale}', [SaleController::class, 'viewFile'])->name('viewFile-sale');
    Route::get('awaitingShipping-sale', [SaleController::class, 'awaitingShipping'])->name('awaitingShipping-sale');
    Route::get('import-sale', [SaleController::class, 'showImportForm'])->name('import-form');
    Route::post('import-sale', [SaleController::class, 'import'])->name('import');


    Route::get('saleFileType', [SalesFileTypeController::class, 'index'])->name('saleFileType');
    Route::get('create-saleFileType', [SalesFileTypeController::class, 'create'])->name('create-saleFileType');
    Route::post('create-saleFileType', [SalesFileTypeController::class, 'store'])->name('store-saleFileType');
    Route::get('edit-saleFileType/{salesFileType}', [SalesFileTypeController::class, 'edit'])->name('edit-saleFileType');
    Route::put('update-saleFileType/{salesFileType}', [SalesFileTypeController::class, 'update'])->name('update-saleFileType');
    Route::delete('delete-saleFileType/{salesFileType}', [SalesFileTypeController::class, 'destroy'])->name('delete-saleFileType');
    


    Route::get('monthly-report', [ReportController::class, 'viewMonthly'])->name('monthly-report');
    Route::get('yearly-report', [ReportController::class, 'viewYearly'])->name('yearly-report');
    Route::get('yearly-Brand-report', [ReportController::class, 'viewBrandYearly'])->name('yearly-Brand-report');
    Route::get('export-report', [ReportController::class, 'exportReport'])->name('export-report');


    Route::get('expensesType', [ExpensesTypeController::class, 'index'])->name('expensesType');
    Route::get('create-expenses-Type', [ExpensesTypeController::class, 'create'])->name('create-expenses-type');
    Route::post('create-expenses-type', [ExpensesTypeController::class, 'store'])->name('store-expenses-type');
    Route::get('edit-expenses-type/{expensesType}', [ExpensesTypeController::class, 'edit'])->name('edit-expenses-type');
    Route::put('update-expenses-type/{expensesType}', [ExpensesTypeController::class, 'update'])->name('update-expenses-type');
    Route::delete('delete-expenses-type/{expensesType}', [ExpensesTypeController::class, 'destroy'])->name('delete-expenses-type');
    Route::get('expensesType/{expensesType}', [ExpensesTypeController::class, 'view'])->name('view-expenses-type');


    Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::get('create-expenses', [ExpensesController::class, 'create'])->name('create-expenses');
    Route::post('create-expenses', [ExpensesController::class, 'store'])->name('store-expenses');
    Route::get('edit-expenses/{expenses}', [ExpensesController::class, 'edit'])->name('edit-expenses');
    Route::delete('delete-expenses/{expenses}', [ExpensesController::class, 'destroy'])->name('delete-expenses');
    Route::put('update-expenses/{expenses}', [ExpensesController::class, 'update'])->name('update-expenses');
    Route::post('update-expense-status', [ExpensesController::class, 'updateStatus'])->name('update-expense-status');
    Route::get('view-expenses/{group_id}', [ExpensesController::class, 'view'])->name('view-expenses');


    Route::get('purchaseOrder', [PurchaseOrderController::class, 'index'])->name('purchaseOrder');
    Route::get('create-purchaseOrder', [PurchaseOrderController::class, 'create'])->name('create-purchaseOrder');
    Route::post('create-purchaseOrder', [PurchaseOrderController::class, 'store'])->name('store-purchaseOrder');

    Route::get('quotation', [QuotationController::class, 'index'])->name('quotation');
    Route::get('create-quotation', [QuotationController::class, 'create'])->name('create-quotation');
    Route::post('create-quotation', [QuotationController::class, 'store'])->name('store-quotation');
    

    Route::get('platform', [PlatformController::class, 'index'])->name('platform');
    Route::get('create-platform', [PlatformController::class, 'create'])->name('create-platform');
    Route::post('create-platform', [PlatformController::class, 'store'])->name('store-platform');
    Route::get('edit-platform/{platform}', [PlatformController::class, 'edit'])->name('edit-platform');
    Route::put('update-platform/{platform}', [PlatformController::class, 'update'])->name('update-platform');
    Route::delete('delete-platform/{platform}', [PlatformController::class, 'destroy'])->name('delete-platform');
    
    Route::get('/generate-payment-plan', [PaymentPlanController::class, 'paymentPlan'])->name('paymentPlan');
    Route::post('/generate-payment-plan', [PaymentPlanController::class, 'generatePaymentPlan'])->name('generatePaymentPlan');

    Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('create-employee', [EmployeeController::class, 'create'])->name('create-employee');
    Route::post('create-employee', [EmployeeController::class, 'store'])->name('store-employee');
    Route::get('edit-employee/{employee}', [EmployeeController::class, 'edit'])->name('edit-employee');
    Route::put('update-employee/{employee}', [EmployeeController::class, 'update'])->name('update-employee');
    Route::delete('delete-employee/{employee}', [EmployeeController::class, 'destroy'])->name('delete-employee');


    //Route::get('/send-reminder-email', [ShippingReminderController::class, 'sendReminderEmail']);
    Route::get('/send-reminder-email', [ShippingReminderController::class, 'sendReminderEmail']);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
