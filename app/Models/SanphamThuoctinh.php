<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SanphamThuoctinh
 * 
 * @property int $sp_id
 * @property int $tt_id
 * @property string $sptt_giatri
 * 
 * @property Sanpham $sanpham
 * @property Thuoctinh $thuoctinh
 *
 * @package App\Models
 */
class SanphamThuoctinh extends Model
{
	protected $table = 'sanpham_thuoctinh';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'sp_id' => 'int',
		'tt_id' => 'int'
	];

	protected $fillable = [
		'sp_id',
		'tt_id',
		'sptt_giatri'
	];

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}

	public function thuoctinh()
	{
		return $this->belongsTo(Thuoctinh::class, 'tt_id');
	}
}
