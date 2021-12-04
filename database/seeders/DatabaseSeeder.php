<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(NhaCungCap::class);
        // $this->call(TheLoai::class);
        $this->call(ThuocTinh::class);
        // $this->call(TheLoai_ThuocTinh::class);
        $this->call(LoaiBaoHanh::class);
        $this->call(BaoHanh::class);
        // $this->call(SanPham::class);
        $this->call(KhachHang::class);
        $this->call(QuanTri::class);
    }
}
