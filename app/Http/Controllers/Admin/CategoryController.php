<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\SanPham;
use Session;
use DB;
class CategoryController extends Controller
{
    /*
        $requestStatus = 1 => add
        $requestStatus = 2 => update
        $requestStatus = 3 => delete
    */
    public function success($requestStatus)
	{
        $alert = '';
        $string = 'danh mục';
        switch ($requestStatus) {
            case 1:
                # code...
                $alert = $alert.'Thêm '.$string.' thành công';
                break;
            case 2:
                # code...
                $alert = $alert.'Cập nhật '.$string.' thành công';
                break;
            case 3:
                # code...
                $alert = $alert.'Xóa '.$string.' thành công';
                break;
        }
        return $alert;
	}

    public function error($requestStatus)
	{
        $alert = '';
        $string = 'danh mục';
        switch ($requestStatus) {
            case 1:
                # code...
                $alert = $alert.'Thêm '.$string.' không thành công';
                break;
            case 2:
                # code...
                $alert = $alert.'Cập nhật '.$string.' không thành công';
                break;
            case 3:
                # code...
                $alert = $alert.'Xóa '.$string.' không thành công';
                break;
        }
        return $alert;
	}

    public function index() {
        $data = TheLoai::all();
        return view('admin.category.index', compact('data'));
    }

    public function create($id, $action) {
        if ($id == 0 && $action == 'add') {
            # code...
            $data = null;
            return view('admin.category.add', compact('data'));
        }else if($action == 'edit'){
            $thuocTinh = DB::table('thuoctinh')->get();
            $data = TheLoai::find($id);
            return view('admin.category.add', compact('data'));
        }
        else if($action == 'del'){
            $checkUsed = SanPham::where('tl_id', $id)->count();
            if($checkUsed > 0) {
                Session::flash('error', 'Danh mục hiện tại đang chứa sản phẩm');
                return redirect()->route('admin.cat.index');
            }else {
                $data = TheLoai::find($id)->delete();
                Session::flash('success', $this->success(3));
                return redirect()->route('admin.cat.index');
            }
        }
    }

    public function store(Request $request) {
        $request->merge(
            [
                'tl_tenkhongdau' => $this->convert_name($request->tl_ten),
                'tl_trangthai' => 1
            ]
        );
        try {
            //code...
            if($request->has('tl_id')) {
                $data = TheLoai::find($request->tl_id)->update($request->all());
                $request->session()->flash('success', $this->success(2));
                return redirect()->back();
            }else {
                $theLoai = TheLoai::create($request->all());
                foreach ($request->thuocTinh as $key => $value) {
                    # code...
                    DB::table('theloai_thuoctinh')->insert(
                        [
                            'tl_id' => $theLoai->tl_id,
                            'tt_id' => $value
                        ]
                    );
                }


                $request->session()->flash('success', $this->success(1));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            $request->session()->flash('error', $this->error(1));
            return redirect()->back();
        }
    }

    public function getAttrAjax() {
        $thuocTinh = DB::table('thuoctinh')->get();
        return response()->json($thuocTinh, 200);
    }

    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
		$str = preg_replace("/(Đ)/", 'd', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return strtolower($str);
	}
}
