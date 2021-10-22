<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class BaoHanh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10 ; $i++) {
            # code...
            DB::table('baohanh')->insert(
                [
                    'bh_ten' => 'Tên bảo hành '.$i,
                    'bh_mota' => 'Mô tả bảo hành '.$i,
                    'lbh_id' => rand(1,5)
                ]
            );
        }
    }
}
