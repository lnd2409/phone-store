<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuoctinhsanpham
 * 
 * @property int $ttsp_id
 * @property string $ttsp_ten
 * @property int $tl_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Theloai $theloai
 *
 * @package App\Models
 */
class Thuoctinhsanpham extends Model
{
	protected $table = 'thuoctinhsanpham';
	protected $primaryKey = 'ttsp_id';

	protected $casts = [
		'tl_id' => 'int'
	];

	protected $fillable = [
		'ttsp_ten',
		'tl_id'
	];

	public function theloai()
	{
		return $this->belongsTo(Theloai::class, 'tl_id');
	}
}
