<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class QuanTri extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quyen')->insert([[
            'q_ten'=>'Admin',
		    'q_mota'=>'admin'
        ],[
            'q_ten'=>'NhanVien',
		    'q_mota'=>'nhanvien'
        ]]);
        
        $data=[
            ['qt_ten'=>'NV1',
            'qt_sdt'=>'0123456789',
            'qt_email'=>'Nv1@gmail.com',
            'qt_diachi'=>'HCM',
            'qt_gioitinh'=>'nữ',
            'qt_active'=>1,
            'username'=>'NV1',
            'password'=>Hash::make('NV1'),
            'q_id'=>2],
            ['qt_ten'=>'NV2',
            'qt_sdt'=>'9876754310',
            'qt_email'=>'Nv2@gmail.com',
            'qt_diachi'=>'HN',
            'qt_gioitinh'=>'nam',
            'qt_active'=>1,
            'username'=>'NV2',
            'password'=>Hash::make('NV2'),
            'q_id'=>2],
            ['qt_ten'=>'Admin',
            'qt_sdt'=>'9876754310',
            'qt_email'=>'admin@gmail.com',
            'qt_diachi'=>'HN',
            'qt_gioitinh'=>'nam',
            'qt_active'=>1,
            'username'=>'admin',
            'password'=>Hash::make('admin'),
            'q_id'=>1]];
            DB::table('quantri')->insert($data);
        
    }
}