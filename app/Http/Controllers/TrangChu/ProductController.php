<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
class ProductController extends Controller
{
    public function index(Request $request) {
        $sanPham = SanPham::all();
        return view('client.product', compact('sanPham'));
    }
}
