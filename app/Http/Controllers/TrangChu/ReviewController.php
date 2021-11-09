<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $binhluan['kh_id']= $request->kh_id;
       $binhluan['sp_id']= $request->sp_id;

       $ctbl['bl_id'] = DB::table('binhluan')->insertGetId($binhluan);

       $ctbl['ctbl_noidung'] = $request->bl_noidung;

       DB::table('chitietbinhluan')->insert($ctbl);

       return redirect()->back();


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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /* 
        Admin
    */

    public function adminGetReview()
    {
        $binhluan = DB::table('binhluan as bl')
        ->join('chitietbinhluan as ctbl','ctbl.bl_id','bl.bl_id')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        ->join('sanpham as sp','sp.sp_id','bl.sp_id')
        ->whereNull('ctbl.ctbl_idrep')
        ->get();
        return view('admin.review.index',compact('binhluan'));
    }

    public function adminDetailReview($id)
    {
        $binhluan = DB::table('binhluan as bl')
        ->join('chitietbinhluan as ctbl','ctbl.bl_id','bl.bl_id')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        ->join('sanpham as sp','sp.sp_id','bl.sp_id')
        ->where('ctbl.ctbl_id',$id)
 
        ->first();
        // dd($binhluan);
        return view('admin.review.detai',compact('binhluan'));
    }

    public function adminRepReview(Request $request)
    {
         $ctbl['bl_id']= $request->bl_id;
         $ctbl['ctbl_noidung'] = $request->bl_noidung;
         $ctbl['ctbl_idrep'] = $request->ctbl_id;
         $ctbl['qt_id'] = $request->nv_id;

         DB::table('chitietbinhluan')->insert($ctbl);

         return redirect()->route('admin.getreview');
    }
}
