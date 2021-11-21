<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TheLoai;
use App\Models\BinhLuan;
use App\Models\HinhAnhSanPham;
use App\Models\Tintuc;
use Session;
use DB;

class SanPhamController extends Controller
{
    public function getProductByCategory($idCat) {
        $sanPham = SanPham::join('theloai','theloai.tl_id','sanpham.tl_id')->where('tl_tenkhongdau',$idCat)
                    ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
                    ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)
                    ->get();
        $theLoai = TheLoai::where('tl_tenkhongdau',$idCat)->first();
        return view('client.product-by-category', compact('sanPham','theLoai'));
    }

    public function productDetail($id) {
        $sanPham = SanPham::find($id);
        $binhluan = DB::table('binhluan as bl')
        ->join('chitietbinhluan as ctbl','ctbl.bl_id','bl.bl_id')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        // ->whereNull('ctbl.ctbl_idrep')
        ->get();
        Session::push('arrProduct', $sanPham->sp_id);
        $sanPhamLienQuan = SanPham::where('tl_id',$sanPham->tl_id)->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->get();
        return view('client.product-detail', compact('sanPham','binhluan','sanPhamLienQuan'));
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

    public function listPost()
    {
        $post=Tintuc::where('tt_trangthai',1)->get();
        return view('client.post',compact('post'));
    }

    public function postDetail(Tintuc $tintuc)
    {
        return view('client.post-detail',compact('tintuc'));
    }
}
