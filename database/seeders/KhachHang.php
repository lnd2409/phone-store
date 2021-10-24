<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
class KhachHang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khachhang =[
            'kh_ten'=>'Trần Thanh Phụng',
            'kh_sdt'=>'0123456789',
            'kh_email'=>'tthanhphung@gmail.com',
            'kh_diachi'=>'Hẽm 21, đường 3/2, Ninh Kiều, Cần Thơ',
            'kh_gioitinh'=>'Nam',
            'kh_trangthai'=>0,
            'username'=>'ttphung',
            'password'=>Hash::make(123)
        ];

        DB::table('khachhang')->insert($khachhang);
    }
}
