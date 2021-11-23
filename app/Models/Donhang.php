<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donhang
 * 
 * @property int $dh_id
 * @property int $sp_id
 * @property int $kh_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Sanpham $sanpham
 * @property Collection|Chitietdonhang[] $chitietdonhangs
 * @property Collection|Khuyenmai[] $khuyenmais
 *
 * @package App\Models
 */
class Donhang extends Model
{
	protected $table = 'donhang';
	protected $primaryKey = 'dh_id';

	protected $casts = [
		'sp_id' => 'int',
		'kh_id' => 'int'
	];

	protected $fillable = [
		'sp_id',
		'kh_id',
		'dh_tongtien'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'kh_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}

	public function chitietdonhangs()
	{
		return $this->hasMany(Chitietdonhang::class, 'dh_id');
	}

	public function khuyenmais()
	{
		return $this->belongsToMany(Khuyenmai::class, 'donhangkhuyenmai', 'dh_id', 'km_id')
					->withPivot('dhkm_id')
					->withTimestamps();
	}
}
