<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangChu\ClientController;
use App\Http\Controllers\TrangChu\SanPhamController;
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
    return view('admin.index');
});


//client
// Route::get('/', function () {
//     return view('client.template.master');
// });
Route::get('/so-sanh-san-pham/{sanpham1}/{sanpham2}', [SanPhamController::class, 'compare'])->name('client.compare');
Route::get('/thong-tin-san-pham',[SanPhamController::class, 'getInfo'])->name('client.getInfo');
Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/{idCate}',[SanPhamController::class, 'getProductByCategory'])->name('client.get-product-by-cat');
Route::get('san-pham/{id}',[SanPhamController::class, 'productDetail'])->name('client.product-detail');