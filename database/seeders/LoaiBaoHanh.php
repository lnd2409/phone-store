<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class LoaiBaoHanh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'lbh_ten' => 'Loại 1',
                'lbh_mota' => 'Mô tả 1'
            ]
        ];
        for ($i=1; $i <= 5; $i++) {
            # code...
            DB::table('loaibaohanh')->insert([
                'lbh_ten' => 'Loại '.$i,
                'lbh_mota' => 'Mô tả loại bảo hành '.$i
            ]);
        }

    }
}
