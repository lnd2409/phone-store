<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaibaohanh
 * 
 * @property int $lbh_id
 * @property string $lbh_ten
 * @property string|null $lbh_mota
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Baohanh[] $baohanhs
 *
 * @package App\Models
 */
class Loaibaohanh extends Model
{
	protected $table = 'loaibaohanh';
	protected $primaryKey = 'lbh_id';

	protected $fillable = [
		'lbh_ten',
		'lbh_mota'
	];

	public function baohanhs()
	{
		return $this->hasMany(Baohanh::class, 'lbh_id');
	}
}
