<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietkhuyenmaisanpham
 * 
 * @property int $ctkmsp_id
 * @property string $ctkmsp_code
 * @property int $ctkmsp_soluong
 * @property float $ctkmsp_giatri
 * @property int|null $ctkmsp_trnagthai
 * @property int $sp_id
 * @property int $lkmsp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaikhuyenmaisanpham $loaikhuyenmaisanpham
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Chitietkhuyenmaisanpham extends Model
{
	protected $table = 'chitietkhuyenmaisanpham';
	protected $primaryKey = 'ctkmsp_id';

	protected $casts = [
		'ctkmsp_soluong' => 'int',
		'ctkmsp_giatri' => 'float',
		'ctkmsp_trnagthai' => 'int',
		'sp_id' => 'int',
		'lkmsp_id' => 'int'
	];

	protected $fillable = [
		'ctkmsp_code',
		'ctkmsp_soluong',
		'ctkmsp_giatri',
		'ctkmsp_trnagthai',
		'sp_id',
		'lkmsp_id'
	];

	public function loaikhuyenmaisanpham()
	{
		return $this->belongsTo(Loaikhuyenmaisanpham::class, 'lkmsp_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
