<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Baohanh
 * 
 * @property int $bh_id
 * @property string $bh_ten
 * @property string|null $bh_mota
 * @property int $lbh_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaibaohanh $loaibaohanh
 * @property Collection|Sanpham[] $sanphams
 *
 * @package App\Models
 */
class Baohanh extends Model
{
	protected $table = 'baohanh';
	protected $primaryKey = 'bh_id';

	protected $casts = [
		'lbh_id' => 'int'
	];

	protected $fillable = [
		'bh_ten',
		'bh_mota',
		'lbh_id'
	];

	public function loaibaohanh()
	{
		return $this->belongsTo(Loaibaohanh::class, 'lbh_id');
	}

	public function sanphams()
	{
		return $this->hasMany(Sanpham::class, 'bh_id');
	}
}
