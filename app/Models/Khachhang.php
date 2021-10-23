<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khachhang
 * 
 * @property int $kh_id
 * @property string $kh_ten
 * @property string|null $kh_sdt
 * @property string|null $kh_email
 * @property string|null $kh_diachi
 * @property string|null $kh_gioitinh
 * @property int $kh_trangthai
 * @property string $username
 * @property string $password
 * @property int $gy_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Gopy $gopy
 * @property Collection|Binhluan[] $binhluans
 * @property Collection|Donhang[] $donhangs
 *
 * @package App\Models
 */
class Khachhang extends Model
{
	protected $table = 'khachhang';
	protected $primaryKey = 'kh_id';

	protected $casts = [
		'kh_trangthai' => 'int',
		'gy_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'kh_ten',
		'kh_sdt',
		'kh_email',
		'kh_diachi',
		'kh_gioitinh',
		'kh_trangthai',
		'username',
		'password',
		'gy_id'
	];

	public function gopy()
	{
		return $this->belongsTo(Gopy::class, 'gy_id');
	}

	public function binhluans()
	{
		return $this->hasMany(Binhluan::class, 'kh_id');
	}

	public function donhangs()
	{
		return $this->hasMany(Donhang::class, 'kh_id');
	}
}
