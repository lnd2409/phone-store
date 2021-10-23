<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Binhluan
 * 
 * @property int $bl_id
 * @property int $sp_id
 * @property int $kh_id
 * @property int $qt_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Quantri $quantri
 * @property Sanpham $sanpham
 * @property Collection|Chitietbinhluan[] $chitietbinhluans
 *
 * @package App\Models
 */
class Binhluan extends Model
{
	protected $table = 'binhluan';
	protected $primaryKey = 'bl_id';

	protected $casts = [
		'sp_id' => 'int',
		'kh_id' => 'int',
		'qt_id' => 'int'
	];

	protected $fillable = [
		'sp_id',
		'kh_id',
		'qt_id'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'kh_id');
	}

	public function quantri()
	{
		return $this->belongsTo(Quantri::class, 'qt_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}

	public function chitietbinhluans()
	{
		return $this->hasMany(Chitietbinhluan::class, 'bl_id');
	}
}
