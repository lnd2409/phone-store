<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietdonhang
 * 
 * @property int $ctdh_id
 * @property int $ctdh_soluong
 * @property int $ctdh_giamgia
 * @property int $ctdh_trangthai
 * @property string $ctdh_sdtnguoinhan
 * @property string $ctdh_diachinguoinhan
 * @property int $dh_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Donhang $donhang
 *
 * @package App\Models
 */
class Chitietdonhang extends Model
{
	protected $table = 'chitietdonhang';
	protected $primaryKey = 'ctdh_id';

	protected $casts = [
		'ctdh_soluong' => 'int',
		'ctdh_giamgia' => 'int',
		'ctdh_trangthai' => 'int',
		'dh_id' => 'int'
	];

	protected $fillable = [
		'ctdh_soluong',
		'ctdh_giamgia',
		'ctdh_trangthai',
		'ctdh_sdtnguoinhan',
		'ctdh_diachinguoinhan',
		'dh_id'
	];

	public function donhang()
	{
		return $this->belongsTo(Donhang::class, 'dh_id');
	}
}
