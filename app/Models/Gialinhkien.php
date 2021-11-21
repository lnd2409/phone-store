<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gialinhkien
 * 
 * @property int $glk_id
 * @property string $glk_ten
 * @property float $glk_giasua
 * @property int $glk_trangthai
 * @property int $dmlk_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Danhmuclinhkien $danhmuclinhkien
 * @property Collection|Chitietphieubaohanh[] $chitietphieubaohanhs
 *
 * @package App\Models
 */
class Gialinhkien extends Model
{
	protected $table = 'gialinhkien';
	protected $primaryKey = 'glk_id';

	protected $casts = [
		'glk_giasua' => 'float',
		'glk_trangthai' => 'int',
		'dmlk_id' => 'int'
	];

	protected $fillable = [
		'glk_ten',
		'glk_giasua',
		'glk_trangthai',
		'dmlk_id'
	];

	public function danhmuclinhkien()
	{
		return $this->belongsTo(Danhmuclinhkien::class, 'dmlk_id');
	}

	public function chitietphieubaohanhs()
	{
		return $this->hasMany(Chitietphieubaohanh::class, 'glk_id');
	}
}
