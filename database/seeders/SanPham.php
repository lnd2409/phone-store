<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SanPham extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 20 ; $i++) {
            # code...
            DB::table('sanpham')->insert([
                'sp_ten' => 'Sản phẩm '.$i,
                'sp_gia' => 1000000,
                'sp_soluong' => rand(50,100),
                'sp_mota' => 'Mô tả sản phẩm '.$i,
                'sp_tinhtrang' => 'Còn hàng',
                'sp_trangthai' => 1,
                'tl_id' => rand(1,5),
                'ncc_id' => rand(1,4),
                'bh_id' => rand(1,10)
            ]);
        }
    }
}
