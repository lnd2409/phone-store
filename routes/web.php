<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangChu\ClientController;
use App\Http\Controllers\TrangChu\SanPhamController;

//admin
use App\Http\Controllers\Admin\SanPhamAdminController;
use App\Http\Controllers\TrangChu\CartProductController;
use App\Http\Controllers\TrangChu\CheckAuthController;
use App\Http\Controllers\TrangChu\VNPayController;
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
    Route::post('xu-ly-them-san-pham', [SanPhamAdminController::class, 'store'])->name('admin.product.store');
    Route::get('{idTheLoai}/thuoc-tinh', [SanPhamAdminController::class, 'ajaxThuocTinh'])->name('admin.product.ajax.cate');
});


//client
// Route::get('/', function () {
//     return view('client.template.master');
// });
Route::get('/so-sanh-san-pham/{sanpham1}/{sanpham2}', [SanPhamController::class, 'compare'])->name('client.compare');
Route::get('/thong-tin-san-pham',[SanPhamController::class, 'getInfo'])->name('client.getInfo');
// Route::get('/', [ClientController::class, 'index'])->name('client.index');
// Route::get('/{idCate}',[SanPhamController::class, 'getProductByCategory'])->name('client.get-product-by-cat');
// Route::get('san-pham/{id}',[SanPhamController::class, 'productDetail'])->name('client.product-detail');


//Xử lý đăng nhập khách hàng
Route::post('/xu-ly-dang-nhap',[CheckAuthController::class,'checkLogin'])->name('client.checkauth');
//Đăn xuất
Route::get('/dang-xuat',[CheckAuthController::class,'checkLogout'])->name('client.logout');


Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/danh-muc/{idCate}',[SanPhamController::class, 'getProductByCategory'])->name('client.get-product-by-cat');
Route::get('san-pham/{id}',[SanPhamController::class, 'productDetail'])->name('client.product-detail');


//Thêm sản phẩm vào giỏ hàng
Route::post('/san-pham-them-gio-hang/{id}',[CartProductController::class,'addProductToCart'])->name('client.addtocart');
Route::get('/chi-tiet-gio-hang',[CartProductController::class,'getProductToCart'])->name('client.gettocart');
Route::get('/thanh-toan-don-hang',[VNPayController::class,'index'])->name('client.checkoutcart');
Route::post('/thanh-toan-don-hang',[VNPayController::class,'payCart'])->name('client.paymentcart');
Route::get('/ket-qua-thanh-toan',[VNPayController::class,'storePayCart'])->name('client.returnvnpay');