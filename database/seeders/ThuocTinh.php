<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ThuocTinh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //của điện thoại
            [
                'tt_ten' => 'Màn hình',
            ],
            [
                'tt_ten' => 'Hệ điều hành',
            ],
            [
                'tt_ten' => 'Camera sau',
            ],
            [
                'tt_ten' => 'Camera trước',
            ],
            [
                'tt_ten' => 'Chip',
            ],
            [
                'tt_ten' => 'RAM',
            ],
            [
                'tt_ten' => 'Bộ nhớ trong',
            ],
            [
                'tt_ten' => 'SIM',
            ],
            [
                'tt_ten' => 'Pin, Sạc',
            ],

            //Laptop
            [
                'tt_ten' => 'CPU',
            ],
            [
                'tt_ten' => 'RAM',
            ],
            [
                'tt_ten' => 'Ổ cứng',
            ],
            [
                'tt_ten' => 'Card màn hình',
            ],
            [
                'tt_ten' => 'Cổng kết nối',
            ],
            [
                'tt_ten' => 'Hệ điều hành',
            ],
            [
                'tt_ten' => 'Thiết kế',
            ],
            [
                'tt_ten' => 'Kích thước, trọng lượng',
            ],

            //máy tính bảng
            [
                'tt_ten' => 'Kết nối',
            ],
            [
                'tt_ten' => 'Pin, Sạc',
            ]
        ];

        DB::table('thuoctinh')->insert($data);
    }
}
