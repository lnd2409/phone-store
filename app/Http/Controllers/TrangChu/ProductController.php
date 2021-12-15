<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
class ProductController extends Controller
{
    public function index(Request $request) {
        $sanPham = SanPham::join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1);
        if($request->has('price') && $request->price != 'null') {
            $price = $request->price;
            switch ($price) {
                case 1:
                    # code...
                    $sanPham = $sanPham->where('sp_gia','>=',0)->where('sp_gia','<=',3000000);
                    break;
                case 2:
                    $sanPham = $sanPham->where('sp_gia','>=',3000000)->where('sp_gia','<=',8000000);
                    break;
                case 3:
                    $sanPham = $sanPham->where('sp_gia','>=',8000000)->where('sp_gia','<=',15000000);
                    break;
                case 4:
                    $sanPham = $sanPham->where('sp_gia','>=',15000000);
                    break;
            }
        }
        $sanPham = $sanPham->get();
        return view('client.product', compact('sanPham'));
    }


}
