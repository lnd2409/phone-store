<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TheLoai;
use Session;

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

    public function getInfo(Request $request)
    {
        $sanpham=SanPham::where('sp_id',$request->sp_id)->first();
        return response()->json($sanpham, 200);
    }

    public function compare(Request $request,SanPham $sanpham1, SanPham $sanpham2)
    {
        $sanpham1=SanPham::where('sp_id',1)->first();
        $sanpham2=SanPham::where('sp_id',2)->first();
        return view('client.compare',compact('sanpham1','sanpham2'));
    }
}