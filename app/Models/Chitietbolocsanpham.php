<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietbolocsanpham
 * 
 * @property int $sp_id
 * @property int $boloc_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Boloc $boloc
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Chitietbolocsanpham extends Model
{
	protected $table = 'chitietbolocsanpham';
	public $incrementing = false;

	protected $casts = [
		'sp_id' => 'int',
		'boloc_id' => 'int'
	];

	protected $fillable = [
		'sp_id',
		'boloc_id'
	];

	public function boloc()
	{
		return $this->belongsTo(Boloc::class);
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
