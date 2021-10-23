<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangChu\ClientController;
use App\Http\Controllers\TrangChu\SanPhamController;
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

Route::get('/admin', function () {
    return view('admin.template.master');
});


//client
// Route::get('/', function () {
//     return view('client.template.master');
// });


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

