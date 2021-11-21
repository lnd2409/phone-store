<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khuyenmai
 * 
 * @property int $km_id
 * @property string $km_macode
 * @property int $km_trangthai
 * @property int $lkm_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaikhuyenmai $loaikhuyenmai
 * @property Collection|Donhang[] $donhangs
 *
 * @package App\Models
 */
class Khuyenmai extends Model
{
	protected $table = 'khuyenmai';
	protected $primaryKey = 'km_id';

	protected $casts = [
		'km_trangthai' => 'int',
		'lkm_id' => 'int'
	];

	protected $fillable = [
		'km_macode',
		'km_trangthai',
		'lkm_id'
	];

	public function loaikhuyenmai()
	{
		return $this->belongsTo(Loaikhuyenmai::class, 'lkm_id');
	}

	public function donhangs()
	{
		return $this->belongsToMany(Donhang::class, 'donhangkhuyenmai', 'km_id', 'dh_id')
					->withPivot('dhkm_id')
					->withTimestamps();
	}
}
