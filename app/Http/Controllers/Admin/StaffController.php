<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quantri;
use App\Models\Quyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nv=Quantri::all();
        return view('admin.staffs.index',compact('nv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q=Quyen::all();
        return view('admin.staffs.create',compact('q'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check=Quantri::where('username',$request->username)->first();
        if($check){
            return back()->with('warning','Username đã tồn tại');
        }
        $request->merge(['password'=>Hash::make($request->password)]);
        Quantri::create($request->all());
        toastr()->success('Đã thêm thành công nhân viên');

        return redirect()->route('admin.staffs.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quantri $quantri)
    {
        $q=Quyen::all();
        return view('admin.staffs.edit',compact('quantri','q'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quantri $quantri)
    {
        $request->password?$request->merge(['password'=>Hash::make($request->password)]):$request->request->remove('password');
        $quantri->update($request->all());
        toastr()->success('Đã cập nhật thành công nhân viên');
        return redirect()->route('admin.staffs.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quantri $quantri)
    {
        $quantri->update(['qt_active'=>0]);
        return redirect()->back();
    }
}