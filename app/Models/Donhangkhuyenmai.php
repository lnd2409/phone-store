<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donhangkhuyenmai
 * 
 * @property int $dhkm_id
 * @property int $dh_id
 * @property int $km_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Donhang $donhang
 * @property Khuyenmai $khuyenmai
 *
 * @package App\Models
 */
class Donhangkhuyenmai extends Model
{
	protected $table = 'donhangkhuyenmai';
	protected $primaryKey = 'dhkm_id';

	protected $casts = [
		'dh_id' => 'int',
		'km_id' => 'int'
	];

	protected $fillable = [
		'dh_id',
		'km_id'
	];

	public function donhang()
	{
		return $this->belongsTo(Donhang::class, 'dh_id');
	}

	public function khuyenmai()
	{
		return $this->belongsTo(Khuyenmai::class, 'km_id');
	}
}
