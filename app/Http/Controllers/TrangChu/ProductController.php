<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
class ProductController extends Controller
{
    public function index(Request $request) {
        $sanPham = SanPham::join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->get();
        return view('client.product', compact('sanPham'));
    }
}
