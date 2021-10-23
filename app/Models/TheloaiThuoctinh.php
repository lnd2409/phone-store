<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TheloaiThuoctinh
 * 
 * @property int $tl_id
 * @property int $tt_id
 * 
 * @property Theloai $theloai
 * @property Thuoctinh $thuoctinh
 *
 * @package App\Models
 */
class TheloaiThuoctinh extends Model
{
	protected $table = 'theloai_thuoctinh';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tl_id' => 'int',
		'tt_id' => 'int'
	];

	protected $fillable = [
		'tl_id',
		'tt_id'
	];

	public function theloai()
	{
		return $this->belongsTo(Theloai::class, 'tl_id');
	}

	public function thuoctinh()
	{
		return $this->belongsTo(Thuoctinh::class, 'tt_id');
	}
}
