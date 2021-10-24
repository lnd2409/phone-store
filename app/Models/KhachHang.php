<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class KhachHang extends Authenticatable
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'khachhang';

    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'kh_id';

    /**
    * The "type" of the auto-incrementing ID.
    *
    * @var string
    */
    protected $keyType = 'integer';

    /**
    * @var array
    */
    protected $fillable =[
    'kh_ten',
    'kh_sdt',
    'kh_email',
    'kh_diachi',
    'kh_gioitinh',
    'kh_trangthai',
    'username',
    'password'
    ];

    protected $hidden = ['password'];
}
