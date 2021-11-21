<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Slideranhsp
 * 
 * @property int $slider_id
 * @property string $slider_anhtren
 * @property string $slider_anhduoi
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Slideranhsp extends Model
{
	protected $table = 'slideranhsp';
	protected $primaryKey = 'slider_id';

	protected $casts = [
		'sp_id' => 'int'
	];

	protected $fillable = [
		'slider_anhtren',
		'slider_anhduoi',
		'sp_id'
	];

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
