<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hinhanhsanpham
 * 
 * @property int $hasp_id
 * @property string|null $hasp_duongdan
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Hinhanhsanpham extends Model
{
	protected $table = 'hinhanhsanpham';
	protected $primaryKey = 'hasp_id';

	protected $casts = [
		'sp_id' => 'int'
	];

	protected $fillable = [
		'hasp_duongdan',
		'sp_id'
	];

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
