<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TheLoai;
class SanPhamController extends Controller
{
    public function getProductByCategory($idCat) {
        $sanPham = SanPham::join('theloai','theloai.tl_id','sanpham.tl_id')->where('tl_tenkhongdau',$idCat)->get();
        $theLoai = TheLoai::where('tl_tenkhongdau',$idCat)->first();
        return view('client.product-by-category', compact('sanPham','theLoai'));
    }

    public function productDetail($id) {
        $sanPham = SanPham::find($id);
        return view('client.product-detail', compact('sanPham'));
    }
}
