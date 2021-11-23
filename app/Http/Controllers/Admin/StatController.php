<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\KhachHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function order(Request $request)
    {
        $month=range(0, 12);
        $request->year??$request->year=Carbon::now()->year;
        
        foreach ($month as $key => $value) {
            $temp[$value]=Donhang::where( DB::raw('YEAR(created_at)'), $request->year )
        ->where( DB::raw('MONTH(created_at)'), '=', $value )
        ->count();
        $data[$value]=$temp[$value];
        }
        $min=Donhang::selectRaw( DB::raw('MIN(created_at) AS min'))->first();
        $range=['min'=>date('Y', strtotime($min->min)),'max'=>date('Y')];

        return view('admin.stat.order',compact('data','range','request'));
    }
    public function revenge(Request $request)
    {
        $month=range(0, 12);
        $request->year??$request->year=Carbon::now()->year;
        
        foreach ($month as $key => $value) {
            $temp[$value]=Donhang::where( DB::raw('YEAR(created_at)'), $request->year )
        ->where( DB::raw('MONTH(created_at)'), '=', $value )
        ->get('dh_tongtien');
        $data[$value]=$temp[$value]->sum('dh_tongtien');
        }
        $min=Donhang::selectRaw( DB::raw('MIN(created_at) AS min'))->first();
        $range=['min'=>date('Y', strtotime($min->min)),'max'=>date('Y')];
        return view('admin.stat.revenge',compact('data','range','request'));
    }
    public function customer(Request $request)
    {
        $month=range(0, 12);
        $request->year??$request->year=Carbon::now()->year;
        
        foreach ($month as $key => $value) {
            $temp[$value]=KhachHang::where( DB::raw('YEAR(created_at)'), $request->year )
        ->where( DB::raw('MONTH(created_at)'), '=', $value )
        ->get();
        $data[$value]=$temp[$value]->count();
        }
        $min=KhachHang::selectRaw( DB::raw('MIN(created_at) AS min'))->first();
        $range=['min'=>date('Y', strtotime($min->min)),'max'=>date('Y')];

        return view('admin.stat.customer',compact('data','range','request'));
    }

}
