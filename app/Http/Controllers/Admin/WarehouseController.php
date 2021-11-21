<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khohang = DB::table('khohang as kh')
        ->join('nhacungcap as ncc','ncc.ncc_id','kh.ncc_id')
        ->get();
        return view('admin.warehouse.index',compact('khohang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getWarehouses()
    {
        $ncc = DB::table('nhacungcap')->get();
        return view('admin.warehouse.create',compact('ncc'));
    }
    public function sotreWarehouses(Request $request)
    {
       $data['khohang_tensanpham']=$request->kh_tensp;
       $data['khohang_soluongnhap']=$request->kh_sln;
       $data['khohang_soluongxuat']=$request->kh_slx;
       $data['ncc_id']=$request->ncc_id;

       $result = DB::table('khohang')->insert($data);

      if($result)
      {
          return view('admin.warehouse.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWarehouses($id)
    {
         $ncc = DB::table('nhacungcap')->get();
         $khohang = DB::table('khohang as kh')
         ->join('nhacungcap as ncc','ncc.ncc_id','kh.ncc_id')
         ->where('kh.khohang_id',$id)
         ->first();
        return view('admin.warehouse.update',compact('khohang','ncc'));
    }


    public function submitWarehouses(Request $request)
    {
         $data['khohang_tensanpham']=$request->kh_tensp;
         $data['khohang_soluongnhap']=$request->kh_sln;
         $data['khohang_soluongxuat']=$request->kh_slx;
         $data['ncc_id']=$request->ncc_id;
         $result = DB::table('khohang')->where('khohang_id',$request->kh_id)->update($data);
        return redirect()->route('admin.warehouse');
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
    public function destroyWarehouses($id)
    {
        DB::table('khohang')->where('khohang_id',$id)->delete();
        return redirect()->route('admin.warehouse');
    }
}
