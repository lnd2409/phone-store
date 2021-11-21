<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
        // dd($sanPham);
        return view('client.index', compact('theLoai','sanPham','tinTuc'));
    }

    public function searchProduct (Request $request) {
        $sanPham = '';
        if ($request->tl_id != null) {
            # code...
            $sanPham = SanPham::where('sp_ten','like','%'.$request->sp_ten.'%')->where('tl_id', $request->tl_id)->get();
            dd($sanPham);
            // return view()
        }else {
            $sanPham = SanPham::where('sp_ten','like','%'.$request->sp_ten.'%')->get();
            dd($sanPham);
        }
    }
}
