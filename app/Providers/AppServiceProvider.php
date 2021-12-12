<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TheLoai;
use Illuminate\Support\Facades\View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $theLoaiView = DB::table('theloai')->get();
        View::share('theLoaiView',$theLoaiView);
        $nhaCungCapView = DB::table('nhacungcap')->get();
        View::share('nhaCungCapView',$nhaCungCapView);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
