<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\TheLoai;
use App\Models\SanPham;
use App\Models\Tintuc;
class ClientController extends Controller
{
    public function index() {
        $theLoai = TheLoai::all();
        $sanPham = SanPham::join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->get();
        $tinTuc = TinTuc::all();
        // $sanPhamBanChay = DB::table('chitietdonhang')
        // dd($sanPham);
        return view('client.index', compact('theLoai','sanPham','tinTuc'));
    }

    public function searchProduct (Request $request) {
        $sanPham = '';
        $keyWord = $request->sp_ten;
        if ($request->tl_id != null) {
            # code...
            $sanPham = SanPham::where('sp_ten','like','%'.$request->sp_ten.'%')->where('tl_id', $request->tl_id)->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
            ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->get();
            return view('client.product-search', compact('sanPham','keyWord'));
        }else {
            $sanPham = SanPham::where('sp_ten','like','%'.$request->sp_ten.'%')->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
            ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->get();
            return view('client.product-search', compact('sanPham','keyWord'));
        }
    }

    public function getBillClient()
    {
        $donHang = DB::table('donhang')->where('kh_id',Auth::guard('khachhang')->id())->get();
        
        return view('client.giohang.don-hang',compact('donHang'));
    }

     public function getDetailBill($id)
     {
        $ctdonHang = DB::table('chitietdonhang as ctdh')
        ->join('sanpham as sp','sp.sp_id','ctdh.sp_id')
        ->where('ctdh.dh_id',$id)
        ->get();
        return view('client.giohang.chi-tiet-don-hang',compact('ctdonHang'));
     }
}
