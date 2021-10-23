<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaikhuyenmai
 * 
 * @property int $lkm_id
 * @property string $lkm_ten
 * @property Carbon $lkm_ngaybd
 * @property Carbon $lkm_ngaykt
 * @property int $lkm_soluong
 * @property float $lkm_giatri
 * @property string|null $lkm_mota
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Khuyenmai[] $khuyenmais
 *
 * @package App\Models
 */
class Loaikhuyenmai extends Model
{
	protected $table = 'loaikhuyenmai';
	protected $primaryKey = 'lkm_id';

	protected $casts = [
		'lkm_soluong' => 'int',
		'lkm_giatri' => 'float'
	];

	protected $dates = [
		'lkm_ngaybd',
		'lkm_ngaykt'
	];

	protected $fillable = [
		'lkm_ten',
		'lkm_ngaybd',
		'lkm_ngaykt',
		'lkm_soluong',
		'lkm_giatri',
		'lkm_mota'
	];

	public function khuyenmais()
	{
		return $this->hasMany(Khuyenmai::class, 'lkm_id');
	}
}
