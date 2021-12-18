<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangChu\ClientController;
use App\Http\Controllers\TrangChu\SanPhamController;
use App\Http\Controllers\TrangChu\ReviewController;

//admin
use App\Http\Controllers\Admin\SanPhamAdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\TrangChu\CartProductController;
use App\Http\Controllers\TrangChu\CheckAuthController;
use App\Http\Controllers\TrangChu\VNPayController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\TrangChu\ProductController;
use App\Http\Controllers\Admin\StatController;
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

Route::middleware(['checkAuthQuanTri'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {return view('admin.index');})->name('index');

        // auth
        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
        #product
        Route::get('san-pham', [SanPhamAdminController::class, 'index'])->name('product.list');
        Route::get('them-san-pham', [SanPhamAdminController::class, 'add'])->name('product.add');
        Route::post('xu-ly-them-san-pham', [SanPhamAdminController::class, 'store'])->name('product.store');
        Route::get('{idTheLoai}/thuoc-tinh', [SanPhamAdminController::class, 'ajaxThuocTinh'])->name('product.ajax.cate');
        Route::get('/{id}/sua-san-pham', [SanPhamAdminController::class, 'suaSanPhamODayNeNha'])->name('product.edit');
        Route::get('/{idImg}/xoa-hinh-anh',[SanPhamAdminController::class, 'removeImageSlider'])->name('remove.image.product');
        Route::post('/{id}/xu-ly-sua-san-pham',[SanPhamAdminController::class, 'handleEditProductForML'])->name('handle.edit.product');
        Route::prefix('nhan-vien')->name('staffs.')->group(function () {
            Route::get('/', [StaffController::class,'index'])->name('index');
            Route::get('/them', [StaffController::class,'create'])->name('create');
            Route::post('/luu', [StaffController::class,'store'])->name('store');
            Route::get('/sua/{quantri}', [StaffController::class,'edit'])->name('edit');
            Route::post('/cap-nhat/{quantri}', [StaffController::class,'update'])->name('update');
            Route::post('/xoa/{quantri}', [StaffController::class,'destroy'])->name('destroy');
        });

        Route::group(['middleware' => 'checkRole:1'], function () {//admin

            Route::prefix('nhan-vien')->name('staffs.')->group(function () {
                Route::get('/', [StaffController::class,'index'])->name('index');
                Route::get('/them', [StaffController::class,'create'])->name('create');
                Route::post('/luu', [StaffController::class,'store'])->name('store');
                Route::get('/sua/{quantri}', [StaffController::class,'edit'])->name('edit');
                Route::post('/cap-nhat/{quantri}', [StaffController::class,'update'])->name('update');
                Route::post('/xoa/{quantri}', [StaffController::class,'destroy'])->name('destroy');

            });
        });
        Route::prefix('khach-hang')->name('clients.')->group(function () {
            Route::get('/', [AdminClientController::class,'index'])->name('index');
            Route::post('/khoi-phuc/{khachhang}', [AdminClientController::class,'restore'])->name('restore');
            Route::post('/xoa/{khachhang}', [AdminClientController::class,'destroy'])->name('destroy');

        });
        Route::prefix('bai-viet')->name('posts.')->group(function () {
            Route::get('/', [PostController::class,'index'])->name('index');
            Route::get('/them', [PostController::class,'create'])->name('create');
            Route::post('/luu', [PostController::class,'store'])->name('store');
            Route::get('/sua/{tintuc}', [PostController::class,'edit'])->name('edit');
            Route::post('/cap-nhat/{tintuc}', [PostController::class,'update'])->name('update');
            Route::post('/xoa/{tintuc}', [PostController::class,'destroy'])->name('destroy');
            Route::get('/detail/{tintuc}', [PostController::class,'detail'])->name('detail');

        });

        Route::prefix('danh-muc')->name('cat.')->group(function () {
            Route::get('/', [CategoryController::class,'index'])->name('index');
            Route::get('/them-danh-muc/{id}/{action}', [CategoryController::class,'create'])->name('create');
            Route::post('/xu-ly-them', [CategoryController::class,'store'])->name('store');
            Route::get('/show-thuoc-tinh/{idTheLoai}', [CategoryController::class,'getAttrAjax'])->name('getAttr');
            Route::get('/xoa-thuoc-tinh/{idTT}/{idTL}', [CategoryController::class,'xoaThuocTinh'])->name('xoaThuocTinh');
        });

        //Review
        Route::get('/quan-li-binh-luan',[ReviewController::class,'adminGetReview'])->name('getreview');
        Route::get('/chi-tiet-binh-luan/{id}',[ReviewController::class,'adminDetailReview'])->name('getdetailreview');
        Route::post('/tra-loi-binh-luan',[ReviewController::class,'adminRepReview'])->name('getrepreview');
        Route::get('/xoa-binh-luan/{id}',[ReviewController::class,'destroy'])->name('destroycomment');

        //Hóa đơn
        Route::get('/hoa-don',[BillController::class,'index'])->name('getbill');
        Route::post('/hoa-don',[BillController::class,'updateStatus'])->name('updatestatusbill');
        Route::get('/chi-tiet-hoa-don/{id}',[BillController::class,'detail'])->name('billdetail');
        Route::get('/xoa-hoa-don/{id}',[BillController::class,'destroy'])->name('deletedetail');
        Route::get('/cap-nhat-hoa-don/{id}',[BillController::class,'updateStatusBill'])->name('update.bill.status');

        // Kho hàng
        Route::get('/kho-hang',[WarehouseController::class,'index'])->name('warehouse');
        Route::get('/kho-hang-them',[WarehouseController::class,'getWarehouses'])->name('getwarehouses');
        Route::post('/kho-hang-them',[WarehouseController::class,'sotreWarehouses'])->name('submitwarehouses');
        Route::get('/kho-hang-cap-nhat/{id}',[WarehouseController::class,'updateWarehouses'])->name('updatewarehouses');
        Route::post('/kho-hang-cap-nhat-luu',[WarehouseController::class,'submitWarehouses'])->name('luuwarehouses');
        Route::get('/kho-hang-xoa/{id}',[WarehouseController::class,'destroyWarehouses'])->name('destroywarehouses');

        // Loại khuyến mãi
        Route::get('/loai-khuyen-mai',[PromotionController::class,'indexType'])->name('typepromotion');
        Route::get('/them-loai-khuyen-mai',[PromotionController::class,'getTypePromotion'])->name('gettypepromotion');
        Route::post('/them-loai-khuyen-mai',[PromotionController::class,'submitTypePromotion'])->name('submittypepromotion');
        Route::get('/sua-loai-khuyen-mai/{id}',[PromotionController::class,'getUpdateTypePromotion'])->name('getupdatetypepromotion');
        Route::post('/sua-loai-khuyen-mai/{id}',[PromotionController::class,'updateTypePromotion'])->name('updatetypepromotion');
        Route::get('/xoa-loai-khuyen-mai/{id}',[PromotionController::class,'destroyTypePromotion'])->name('destroytypepromotion');

        // Khuyến mãi
        Route::get('/khuyen-mai',[PromotionController::class,'indexPromotion'])->name('promotion');
        Route::get('/them-khuyen-mai',[PromotionController::class,'getPromotion'])->name('getpromotion');
        Route::post('/them-khuyen-mai',[PromotionController::class,'submitPromotion'])->name('submitpromotion');
        Route::get('/sua-khuyen-mai/{id}',[PromotionController::class,'getUpdatePromotion'])->name('getupdatepromotion');
        Route::post('/sua-khuyen-mai/{id}',[PromotionController::class,'updatePromotion'])->name('updatepromotion');
        Route::get('/xoa-khuyen-mai/{id}',[PromotionController::class,'destroyPromotion'])->name('destroypromotion');

        //

        //thống kê
        Route::get('/thong-ke-don-hang',[StatController::class,'order'])->name('stat.order');
        Route::get('/thong-ke-doanh-thu',[StatController::class,'revenge'])->name('stat.revenge');
        Route::get('/thong-ke-khach-hang',[StatController::class,'customer'])->name('stat.customer');

    });
});
Route::view('/sign-in', 'admin.auth.sign-in')->name('admin.signIn');
Route::post('/handleLogin', [AuthController::class,'handleLogin'])->name('admin.handleLogin');

//Khách hàng đăng ký
Route::post('/register', [AuthController::class,'handleRegister'])->name('handleRegister');
Route::post('/dang-xuat', [AuthController::class,'handleCustomLogout'])->name('handleCustomLogout');

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
Route::get('/danh-muc/bai-viet',[SanPhamController::class, 'listPost'])->name('client.listPost');
Route::get('/danh-muc/{idCate}',[SanPhamController::class, 'getProductByCategory'])->name('client.get-product-by-cat');
Route::get('san-pham/{id}',[SanPhamController::class, 'productDetail'])->name('client.product-detail');
Route::get('chi-tiet-bai-viet/{tintuc}',[SanPhamController::class, 'postDetail'])->name('client.post-detail');


//Thêm sản phẩm vào giỏ hàng
Route::post('/san-pham-them-gio-hang/{id}',[CartProductController::class,'addProductToCart'])->name('client.addtocart');
Route::post('/cap-nhat-gio-hang/{id}',[CartProductController::class,'updateProductToCart'])->name('client.updatetocart');
Route::get('/chi-tiet-gio-hang',[CartProductController::class,'getProductToCart'])->name('client.gettocart');
Route::get('/xoa-gio-hang',[CartProductController::class,'destroyProductToCart'])->name('client.destroytocart');
Route::get('/thanh-toan-don-hang',[VNPayController::class,'index'])->name('client.checkoutcart');
Route::post('/thanh-toan-don-hang',[VNPayController::class,'payCart'])->name('client.paymentcart');
Route::get('/ket-qua-thanh-toan',[VNPayController::class,'storePayCart'])->name('client.returnvnpay');

//Kiểm tra khuyến mãi
Route::post('/kiem-tra-khuyen-mai',[CartProductController::class,'checkPromotion'])->name('client.checkpromotion');



//Sản phẩm
Route::prefix('/san-pham')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
});
//Bình luận sản phẩm
Route::post('/san-pham-binh-luan',[ReviewController::class,'store'])->name('client.submitreview');
Route::get('/xoa-binh-luan/{id}',[ReviewController::class,'destroy'])->name('client.destroycomment');
Route::post('/bao-cao-vi-pham',[ReviewController::class,'reportComment'])->name('client.reportcomment');

//search product
Route::post('/tim-kiem', [ClientController::class, 'searchProduct'])->name('client.search.product.by.name');
//Đơn hàng của khách hàng
Route::get('/don-hang',[ClientController::class,'getBillClient'])->name('client.getbill');
Route::get('/chi-tiet-don-hang/{id}',[ClientController::class,'getDetailBill'])->name('client.getdetailbill');

//Thông tin cá nhân
Route::get('/thong-tin-khach-hang',[CheckAuthController::class,'customerInfo'])->name('client.infor');
// Cập nhật Thông tin cá nhân
Route::post('/thong-tin-khach-hang',[CheckAuthController::class,'customerUpdateInfo'])->name('client.updateinfor');
