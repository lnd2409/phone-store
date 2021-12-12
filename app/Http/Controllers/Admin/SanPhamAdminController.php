<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TheLoai;
use App\Models\NhaCungCap;
use DB;
class SanPhamAdminController extends Controller
{
    public function index(Request $request) {
        $sanPham = SanPham::all();
        return view('admin.product.index', compact('sanPham'));
    }

    public function add() {
        $nhaCungCap = NhaCungCap::all();
        $theLoai = TheLoai::all();
        return view('admin.product.add', compact('nhaCungCap','theLoai'));
    }

    public function store(Request $request) {
        // dd($request->tenSanPham);
        $data = [
            'sp_ten' => $request->tenSanPham,
            'sp_gia' => $request->giaBan,
            'sp_soluong' => $request->soLuong,
            'sp_moTa' => $request->moTa,
            'sp_trangthai' => 1,
            'sp_tinhtrang' => 'Còn hàng',
            'ncc_id' => $request->nhaCungCap,
            'tl_id' => $request->theLoai,
            'bh_id' => 1
        ];
        // dd(count($request->thuocTinh));
        $sanPham = SanPham::insertGetId($data);
        foreach ($request->idThuocTinh as $key => $value) {
            # code...
            DB::table('sanpham_thuoctinh')->insert(
                [
                    'sp_id' => $sanPham,
                    'tt_id' => $value
                ]
            );
        }

        //for where sp_id, tt_id, update sptt_giatri
        foreach ($request->idThuocTinh as $key => $value) {
            DB::table('sanpham_thuoctinh')
                ->where('sp_id',$sanPham)
                ->where('tt_id', $value)
                ->update(
                [
                    'sptt_giatri' => $request->thuocTinh[$key]
                ]
            );
        }

        if($request->hasFile('productImage'))
        {
            $file = $request->file('productImage');
            $nameFile = $file->getClientOriginalName('productImage');
            $file->move('upload/images/product',$nameFile);
            DB::table('hinhanhsanpham')->insert(
                [
                    'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                    'hasp_hinhanhdaidien' => 1,
                    'sp_id' => $sanPham
                ]
            );
        }
        if ($request->productSlider != null) {
            # code...
            // foreach ($request->productSlider as $key => $value) {
                # code...
                $file = $request->file('productSlider');
                foreach ($file as $key => $value) {
                // dd($file);
                $nameFile = $value->getClientOriginalName('productSlider');
                $value->move('upload/images/product',$nameFile);
                DB::table('hinhanhsanpham')->insert(
                    [
                        'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                        'sp_id' => $sanPham
                    ]
                );
            }
                // dd($request->productSlider);
            // }


        }

        return redirect()->route('admin.product.list');
    }

    public function ajaxThuocTinh($idTheLoai) {
        $thuocTinh = DB::table('theloai_thuoctinh')->join('theloai','theloai.tl_id','theloai_thuoctinh.tl_id')
        ->join('thuoctinh','thuoctinh.tt_id','theloai_thuoctinh.tt_id')->where('theloai_thuoctinh.tl_id',$idTheLoai)
        ->get([
            'thuoctinh.tt_ten',
            'thuoctinh.tt_id'
        ]);

        // $data = [
        //     'data' =>
        // ]

        return response()->json($thuocTinh,200);
    }

    public function suaSanPhamODayNeNha($id) {
        $sanPham = SanPham::find($id);
        $theLoai = TheLoai::all();
        $nhaCungCap = NhaCungCap::all();
        return view('admin.product.edit', compact('nhaCungCap','theLoai','sanPham'));
    }
}
