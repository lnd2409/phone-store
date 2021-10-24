<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangChu\ClientController;
use App\Http\Controllers\TrangChu\SanPhamController;

//admin
use App\Http\Controllers\Admin\SanPhamAdminController;
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


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    #product
    Route::get('san-pham', [SanPhamAdminController::class, 'index'])->name('admin.product.list');
    Route::get('them-san-pham', [SanPhamAdminController::class, 'add'])->name('admin.product.add');
    Route::post('xu-ly-them-san-pham', [SanPhamAdminController::class, 'store'])->name('admin.product.store');\
    Route::get('{idTheLoai}/thuoc-tinh', [SanPhamAdminController::class, 'ajaxThuocTinh'])->name('admin.product.ajax.cate');
});


//client
// Route::get('/', function () {
//     return view('client.template.master');
// });

Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/{idCate}',[SanPhamController::class, 'getProductByCategory'])->name('client.get-product-by-cat');
Route::get('san-pham/{id}',[SanPhamController::class, 'productDetail'])->name('client.product-detail');
