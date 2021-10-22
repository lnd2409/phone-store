<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TheLoai;
use App\Models\SanPham;
class ClientController extends Controller
{
    public function index() {
        $theLoai = TheLoai::all();
        $sanPham = SanPham::all();
        // dd($sanPham);
        return view('client.index', compact('theLoai','sanPham'));
    }
}
