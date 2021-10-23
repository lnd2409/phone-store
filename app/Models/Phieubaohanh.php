<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieubaohanh
 * 
 * @property int $pbh_id
 * @property int $pbh_trangthai
 * @property string $pbh_imei
 * @property string $pbh_tenkhachhang
 * @property string $pbh_sdt
 * @property string $pbh_diachi
 * @property Carbon $pbh_ngaynhan
 * @property Carbon|null $pbh_ngayhentra
 * @property string $pbh_ghichu
 * @property int $qt_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Quantri $quantri
 * @property Collection|Chitietphieubaohanh[] $chitietphieubaohanhs
 *
 * @package App\Models
 */
class Phieubaohanh extends Model
{
	protected $table = 'phieubaohanh';
	protected $primaryKey = 'pbh_id';

	protected $casts = [
		'pbh_trangthai' => 'int',
		'qt_id' => 'int'
	];

	protected $dates = [
		'pbh_ngaynhan',
		'pbh_ngayhentra'
	];

	protected $fillable = [
		'pbh_trangthai',
		'pbh_imei',
		'pbh_tenkhachhang',
		'pbh_sdt',
		'pbh_diachi',
		'pbh_ngaynhan',
		'pbh_ngayhentra',
		'pbh_ghichu',
		'qt_id'
	];

	public function quantri()
	{
		return $this->belongsTo(Quantri::class, 'qt_id');
	}

	public function chitietphieubaohanhs()
	{
		return $this->hasMany(Chitietphieubaohanh::class, 'pbh_id');
	}
}
