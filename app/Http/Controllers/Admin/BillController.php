<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $donhang = DB::table('khachhang as kh')
        ->join('donhang as dh','kh.kh_id','dh.kh_id')
        ->get();
        // dd( $donhang);
        return view('admin.bill.index',compact('donhang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $donhang = DB::table('chitietdonhang as ctdh')
        ->join('donhang as dh','dh.dh_id','ctdh.dh_id')
        ->join('khachhang as kh','kh.kh_id','dh.kh_id')
        ->join('sanpham as sp','sp.sp_id','ctdh.sp_id')
        ->where('dh.dh_id',$id)
        ->get();
        return view('admin.bill.detail',compact('donhang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $id = $request->dh_id;
        $dh_tinhtrang = (int) $request->dh_tinhtrang;
        // dd($dh_tinhtrang);
        DB::table('donhang')->where('dh_id',$id)->update(
            [
                'dh_tinhtrang'=>$dh_tinhtrang
            ]
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('donhang')->where('dh_id',$id)->delete();
        return redirect()->back();
    }
}
