<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuclinhkien
 * 
 * @property int $dmlk_id
 * @property string $dmlk_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Gialinhkien[] $gialinhkiens
 *
 * @package App\Models
 */
class Danhmuclinhkien extends Model
{
	protected $table = 'danhmuclinhkien';
	protected $primaryKey = 'dmlk_id';

	protected $fillable = [
		'dmlk_ten'
	];

	public function gialinhkiens()
	{
		return $this->hasMany(Gialinhkien::class, 'dmlk_id');
	}
}
