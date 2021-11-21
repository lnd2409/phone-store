<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaikhuyenmaisanpham
 * 
 * @property int $lkmsp_id
 * @property string $lkmsp_ten
 * @property Carbon $lkmsp_ngaybd
 * @property Carbon $lkmsp_ngaykt
 * @property string|null $lkmsp_mota
 * @property int $lkmsp_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Chitietkhuyenmaisanpham[] $chitietkhuyenmaisanphams
 *
 * @package App\Models
 */
class Loaikhuyenmaisanpham extends Model
{
	protected $table = 'loaikhuyenmaisanpham';
	protected $primaryKey = 'lkmsp_id';

	protected $casts = [
		'lkmsp_trangthai' => 'int'
	];

	protected $dates = [
		'lkmsp_ngaybd',
		'lkmsp_ngaykt'
	];

	protected $fillable = [
		'lkmsp_ten',
		'lkmsp_ngaybd',
		'lkmsp_ngaykt',
		'lkmsp_mota',
		'lkmsp_trangthai'
	];

	public function chitietkhuyenmaisanphams()
	{
		return $this->hasMany(Chitietkhuyenmaisanpham::class, 'lkmsp_id');
	}
}
