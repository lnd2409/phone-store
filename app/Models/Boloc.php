<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Boloc
 * 
 * @property int $boloc_id
 * @property string $boloc_ten
 * @property int $boloc_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Sanpham[] $sanphams
 *
 * @package App\Models
 */
class Boloc extends Model
{
	protected $table = 'boloc';
	protected $primaryKey = 'boloc_id';

	protected $casts = [
		'boloc_trangthai' => 'int'
	];

	protected $fillable = [
		'boloc_ten',
		'boloc_trangthai'
	];

	public function sanphams()
	{
		return $this->belongsToMany(Sanpham::class, 'chitietbolocsanpham', 'boloc_id', 'sp_id')
					->withTimestamps();
	}
}
