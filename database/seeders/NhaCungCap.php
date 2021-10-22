<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NhaCungCap extends Seeder
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
                'ncc_ten' => 'Di động thông minh',
                'ncc_sdt' => '123456789',
                'ncc_email' => 'ddtm@gmail.com',
                'ncc_diachi' => 'TP. Hồ Chí Minh'
            ],
            [
                'ncc_ten' => 'Click buy',
                'ncc_sdt' => '123456789',
                'ncc_email' => 'clickbuy@gmail.com',
                'ncc_diachi' => 'TP. Hồ Chí Minh'
            ],
            [
                'ncc_ten' => 'Thế giới di động',
                'ncc_sdt' => '123456789',
                'ncc_email' => 'tgdd@gmail.com',
                'ncc_diachi' => 'TP. Hồ Chí Minh'
            ],
            [
                'ncc_ten' => 'FPT Shop',
                'ncc_sdt' => '123456789',
                'ncc_email' => 'fpt-shop@gmail.com',
                'ncc_diachi' => 'TP. Hồ Chí Minh'
            ]
        ];

        DB::table('nhacungcap')->insert($data);
    }
}
