<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TheLoai;
class AttributeController extends Controller
{
    public function index() {
        $data = DB::table('thuoctinh')->get();
        dd($data);
    }

    public function add($id) {
        $giaoVien = GiaoVien::find($id);
        // dd($lop);
        if ($id == 'add') {
            return view('admin.teacher.add', compact('giaoVien'));
        }else {
            return view('admin.teacher.add', compact('giaoVien'));
        }
        return "error";
    }

}
