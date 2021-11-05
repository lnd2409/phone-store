<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Tintuc
 * 
 * @property int $tt_id
 * @property string $tt_tieude
 * @property string $tt_noidung
 * @property string $tt_hinhanh
 * @property int $tt_trangthai
 * @property int $qt_id
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Quantri $quantri
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Tintuc extends Model
{
	protected $table = 'tintuc';
	protected $primaryKey = 'tt_id';

	protected $casts = [
		'tt_trangthai' => 'int',
		'qt_id' => 'int',
	];

	protected $fillable = [
		'tt_tieude',
		'tt_noidung',
		'tt_hinhanh',
		'tt_trangthai',
		'qt_id',
	];

	public function quantri()
	{
		return $this->belongsTo(Quantri::class, 'qt_id');
	}

	public function getTtHinhanhAttribute()
	{
		return Storage::disk('tt_hinhanh')->url($this->attributes['tt_hinhanh']);
	}

}