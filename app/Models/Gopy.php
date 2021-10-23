<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gopy
 * 
 * @property int $gy_id
 * @property string $gy_noidung
 * @property int $gy_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Khachhang[] $khachhangs
 *
 * @package App\Models
 */
class Gopy extends Model
{
	protected $table = 'gopy';
	protected $primaryKey = 'gy_id';

	protected $casts = [
		'gy_trangthai' => 'int'
	];

	protected $fillable = [
		'gy_noidung',
		'gy_trangthai'
	];

	public function khachhangs()
	{
		return $this->hasMany(Khachhang::class, 'gy_id');
	}
}
