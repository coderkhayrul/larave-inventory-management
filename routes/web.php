<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasicSettingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PurchaseUnitController;
use App\Http\Controllers\SellUnitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashabord');
    // USER ROUTE LIST
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{slug}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/soft-delete{slug}', [UserController::class, 'softdelete'])->name('user.softdelete');
    Route::get('/user/restore{slug}', [UserController::class, 'restore'])->name('user.restore');
    Route::delete('/user/{slug}', [UserController::class, 'destroy'])->name('user.destroy');

    // PDF GEN ROUTE
    Route::get('/user/pdf', [UserController::class, 'generatePDF'])->name('user.pdf');

    // CUSTOMER GROUP ROUTE LIST
    Route::get('/customer/groups', [CustomerGroupController::class, 'index'])->name('customer.group.index');
    Route::get('/customer/group/create', [CustomerGroupController::class, 'create'])->name('customer.group.create');
    Route::post('/customer/group', [CustomerGroupController::class, 'store'])->name('customer.group.store');
    Route::get('/customer/group/edit/{slug}', [CustomerGroupController::class, 'edit'])->name('customer.group.edit');
    Route::put('/customer/group/{slug}', [CustomerGroupController::class, 'update'])->name('customer.group.update');
    Route::delete('/customer/group/{slug}', [CustomerGroupController::class, 'destroy'])->name('customer.group.destroy');

    // CUSTOMER ROUTE LIST
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/show/{slug}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customer/edit/{slug}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{slug}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{slug}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    // PDF GEN ROUTE
    Route::get('/customer/pdf', [CustomerController::class, 'generatePDF'])->name('customer.pdf');

    // SUPPLIER ROUTE LIST
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/show/{slug}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/supplier/edit/{slug}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{slug}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{slug}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::get('/supplier/pdf', [SupplierController::class, 'generatePDF'])->name('supplier.pdf');


    // PRODUCT-CATEGORY ROUTE LIST
    Route::get('/product/category', [ProductCategoryController::class, 'index'])->name('product.category.index');
    Route::get('/product/category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
    Route::post('/product/category', [ProductCategoryController::class, 'store'])->name('product.category.store');
    Route::get('/product/category/show/{slug}', [ProductCategoryController::class, 'show'])->name('product.category.show');
    Route::get('/product/category/edit/{slug}', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
    Route::put('/product/category/{slug}', [ProductCategoryController::class, 'update'])->name('product.category.update');
    Route::delete('/product/category/{slug}', [ProductCategoryController::class, 'destroy'])->name('product.category.destroy');

    // PRODUCT-TYPE ROUTE LIST
    Route::get('/product/type', [ProductTypeController::class, 'index'])->name('product.type.index');
    Route::get('/product/type/create', [ProductTypeController::class, 'create'])->name('product.type.create');
    Route::post('/product/type', [ProductTypeController::class, 'store'])->name('product.type.store');
    Route::get('/product/type/edit/{slug}', [ProductTypeController::class, 'edit'])->name('product.type.edit');
    Route::put('/product/type/{slug}', [ProductTypeController::class, 'update'])->name('product.type.update');
    Route::delete('/product/type/{slug}', [ProductTypeController::class, 'destroy'])->name('product.type.destroy');

    // BRAND ROUTE LIST
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/{slug}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{slug}', [BrandController::class, 'destroy'])->name('brand.destroy');

    // PURCHASE UNIT ROUTE LIST
    Route::get('/purchase/unit', [PurchaseUnitController::class, 'index'])->name('purchase.unit.index');
    Route::get('/purchase/unit/create', [PurchaseUnitController::class, 'create'])->name('purchase.unit.create');
    Route::post('/purchase/unit', [PurchaseUnitController::class, 'store'])->name('purchase.unit.store');
    Route::get('/purchase/unit/edit/{slug}', [PurchaseUnitController::class, 'edit'])->name('purchase.unit.edit');
    Route::put('/purchase/unit/{slug}', [PurchaseUnitController::class, 'update'])->name('purchase.unit.update');
    Route::delete('/purchase/unit/{slug}', [PurchaseUnitController::class, 'destroy'])->name('purchase.unit.destroy');

    // SELL UNIT ROUTE LIST
    Route::get('/sell/unit', [SellUnitController::class, 'index'])->name('sell.unit.index');
    Route::get('/sell/unit/create', [SellUnitController::class, 'create'])->name('sell.unit.create');
    Route::post('/sell/unit', [SellUnitController::class, 'store'])->name('sell.unit.store');
    Route::get('/sell/unit/edit/{slug}', [SellUnitController::class, 'edit'])->name('sell.unit.edit');
    Route::put('/sell/unit/{slug}', [SellUnitController::class, 'update'])->name('sell.unit.update');
    Route::delete('/sell/unit/{slug}', [SellUnitController::class, 'destroy'])->name('sell.unit.destroy');

    // TAX ROUTE LIST
    Route::get('tax', [TaxController::class, 'index'])->name('tax.index');
    Route::get('tax/create', [TaxController::class, 'create'])->name('tax.create');
    Route::post('tax', [TaxController::class, 'store'])->name('tax.store');
    Route::get('tax/edit/{slug}', [TaxController::class, 'edit'])->name('tax.edit');
    Route::put('tax/{slug}', [TaxController::class, 'update'])->name('tax.update');
    Route::delete('tax/{slug}', [TaxController::class, 'destroy'])->name('tax.destroy');

    // SOCIAL MEDIA LIST
    Route::get('basic-setting', [BasicSettingController::class, 'index'])->name('basic.setting.index');
    Route::post('basic-setting', [BasicSettingController::class, 'update'])->name('basic.setting.update');
});

require __DIR__.'/auth.php';
