<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TheLoai_ThuocTinh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            //dien thoai
            [
                'tl_id' => 1,
                'tt_id' => 1
            ],
            [
                'tl_id' => 1,
                'tt_id' => 2,
            ],
            [
                'tl_id' => 1,
                'tt_id' => 3
            ],
            [
                'tl_id' => 1,
                'tt_id' => 4
            ],
            [
                'tl_id' => 1,
                'tt_id' => 5
            ],
            [
                'tl_id' => 1,
                'tt_id' => 6
            ],
            [
                'tl_id' => 1,
                'tt_id' => 7
            ],
            [
                'tl_id' => 1,
                'tt_id' => 8
            ],
            [
                'tl_id' => 1,
                'tt_id' => 9
            ],

            //laptop
            [
                'tl_id' => 2,
                'tt_id' => 10
            ],
            [
                'tl_id' => 2,
                'tt_id' => 6
            ],
            [
                'tl_id' => 2,
                'tt_id' => 12
            ],
            [
                'tl_id' => 2,
                'tt_id' => 1
            ],
            [
                'tl_id' => 2,
                'tt_id' => 13
            ],
            [
                'tl_id' => 2,
                'tt_id' => 14
            ],
            [
                'tl_id' => 2,
                'tt_id' => 15
            ],
            [
                'tl_id' => 2,
                'tt_id' => 16
            ],
            [
                'tl_id' => 2,
                'tt_id' => 17
            ],
        ];

        DB::table('theloai_thuoctinh')->insert($data);
    }
}
