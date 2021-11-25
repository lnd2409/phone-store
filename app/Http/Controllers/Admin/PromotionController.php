<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexType()
    {
        $loaiKM = DB::table('loaikhuyenmai')->get();
        return view('admin.typepromotion.index',compact('loaiKM'));
    }


    public function getTypePromotion()
    {
        return view('admin.typepromotion.create');
    }


    public function submitTypePromotion(Request $request)
    {
        DB::table('loaikhuyenmai')->insert($request->except('_token'));
        return redirect()->route('admin.typepromotion');
    }
    public function updateTypePromotion(Request $request,$id)
    {
        if(!empty($request->lkm_ngaybd))
        {
            $data['lkm_ngaybd'] = $request->lkm_ngaybd;
        }
        if(!empty($request->lkm_ngaykt))
        {
            $data['lkm_ngaykt'] = $request->lkm_ngaykt;
        }
        $data['lkm_ten'] = $request->lkm_ten;
        $data['lkm_soluong'] = $request->lkm_soluong;
        $data['lkm_giatri'] = $request->lkm_giatri;
        $data['lkm_mota'] = $request->lkm_mota;
        DB::table('loaikhuyenmai')->where('lkm_id',$id)->update($data);

        return redirect()->route('admin.typepromotion');
    }

    public function getUpdateTypePromotion($id)
    {
         $loaiKM=DB::table('loaikhuyenmai')->where('lkm_id',$id)->first();
        return view('admin.typepromotion.update',compact('loaiKM'));
    }
    
    public function destroyTypePromotion($id)
    {
        $loaiKM=DB::table('loaikhuyenmai')->where('lkm_id',$id)->delete();
        return redirect()->route('admin.typepromotion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indexPromotion()
    {
        $KM = DB::table('khuyenmai as km')
        ->join('loaikhuyenmai as lkm','lkm.lkm_id','km.lkm_id')
        ->get();
        return view('admin.promotion.index',compact('KM'));
    }
    public function getpromotion()
    {
        $loaiKM = DB::table('loaikhuyenmai')->get();
        return view('admin.promotion.create',compact('loaiKM'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitPromotion(Request $request)
    {
       DB::table('khuyenmai')->insert($request->except('_token'));
       return redirect()->route('admin.promotion');
    }
    public function updatePromotion(Request $request, $id)
    {
       DB::table('khuyenmai')->where('km_id',$id)->update($request->except('_token'));
       return redirect()->route('admin.promotion');
    }


    public function getUpdatePromotion($id)
    {
        $loaiKM = DB::table('loaikhuyenmai')->get();
        $KM=DB::table('khuyenmai')->where('km_id',$id)->first();
        return view('admin.promotion.update',compact('loaiKM','KM'));
    }

    public function destroypromotion($id)
    {
        $loaiKM=DB::table('khuyenmai')->where('km_id',$id)->delete();
        return redirect()->route('admin.promotion');
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
}
