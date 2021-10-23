<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bannersanpham
 * 
 * @property int $bn_id
 * @property string $bn_ten
 * @property string $bn_hinhanh
 * @property string $bn_mota
 * @property int $bn_trangthai
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Bannersanpham extends Model
{
	protected $table = 'bannersanpham';
	protected $primaryKey = 'bn_id';

	protected $casts = [
		'bn_trangthai' => 'int',
		'sp_id' => 'int'
	];

	protected $fillable = [
		'bn_ten',
		'bn_hinhanh',
		'bn_mota',
		'bn_trangthai',
		'sp_id'
	];

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
