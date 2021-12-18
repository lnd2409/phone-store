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
            [
                'kh_ten'=>'Trần Văn A',
                'kh_sdt'=>'0123456789',
                'kh_email'=>'test1@gmail.com',
                'kh_diachi'=>'Hẽm 21, đường 3/2, Ninh Kiều, Cần Thơ',
                'kh_gioitinh'=>'Nam',
                'kh_trangthai'=>0,
                'username'=>'test1',
                'password'=>Hash::make(123)
            ],
            [
                'kh_ten'=>'Lê Văn B',
                'kh_sdt'=>'0123456789',
                'kh_email'=>'test2@gmail.com',
                'kh_diachi'=>'Hẽm 21, đường 3/2, Ninh Kiều, Cần Thơ',
                'kh_gioitinh'=>'Nam',
                'kh_trangthai'=>0,
                'username'=>'test2',
                'password'=>Hash::make(123)
            ],
            [
            'kh_ten'=>'Lê Quốc C',
            'kh_sdt'=>'0123456789',
            'kh_email'=>'test3@gmail.com',
            'kh_diachi'=>'Hẽm 21, đường 3/2, Ninh Kiều, Cần Thơ',
            'kh_gioitinh'=>'Nam',
            'kh_trangthai'=>0,
            'username'=>'test3',
            'password'=>Hash::make(123)
            ]
        ];

        DB::table('khachhang')->insert($khachhang);
    }
}
