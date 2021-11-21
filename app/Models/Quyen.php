<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quyen
 * 
 * @property int $q_id
 * @property string $q_ten
 * @property string|null $q_mota
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Quantri[] $quantris
 *
 * @package App\Models
 */
class Quyen extends Model
{
	protected $table = 'quyen';
	protected $primaryKey = 'q_id';

	protected $fillable = [
		'q_ten',
		'q_mota'
	];

	public function quantris()
	{
		return $this->hasMany(Quantri::class, 'q_id');
	}
}
