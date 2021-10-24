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
        if($sanpham1->tl_id != $sanpham1->tl_id){
            return back()->with('error','Không thể so sánh 2 sản phẩm khác loại');
        }
        return view('client.compare',compact('sanpham1','sanpham2'));
    }
}