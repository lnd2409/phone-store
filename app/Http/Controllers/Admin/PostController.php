<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use Carbon\Carbon;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tintuc=Tintuc::all();
        return view('admin.posts.index',compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['tt_trangthai'=>1,'qt_id'=>Auth::guard('quantri')->id()]);
        $tintuc=Tintuc::create($request->all());
        $this->uploadImage($tintuc,$request);

        // toastr()->success('Đã thêm thành công tin tức');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Tintuc $tintuc)
    {
        return view('admin.posts.detail',compact('tintuc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tintuc $tintuc)
    {
        return view('admin.posts.edit',compact('tintuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tintuc $tintuc)
    {
        $request->merge(['tt_trangthai'=>1,'qt_id'=>Auth::guard('quantri')->id()]);
        $tintuc->update($request->all());
        $this->uploadImage($tintuc,$request);
        toastr()->success('Đã cập nhật thành công tin tức');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tintuc $tintuc)
    {
        $tintuc->update(['tt_trangthai'=>0]);
        return redirect()->back();
    }


    public function uploadImage(Tintuc $tintuc, $request)
    {
        if ($request->hasFile('tt_hinhanh')) {
            $tintuc->update(['tt_hinhanh'=>null]);
            $date = Carbon::parse(date('Y-m-d H:i:s'));

            $path = $date->format('Y') . '/' . $date->format('Ymd');

            Storage::disk('tt_hinhanh')->makeDirectory($path);

            $storagePath = Storage::disk('tt_hinhanh')->put($path, $request->file('tt_hinhanh'));
            $tintuc->update(['tt_hinhanh'=>$storagePath]);

        }
    }
}
