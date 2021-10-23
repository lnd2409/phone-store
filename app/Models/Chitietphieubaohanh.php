<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieubaohanh
 * 
 * @property int $ctphb_id
 * @property int $ctphb_soluong
 * @property float $ctphb_gia
 * @property string $ctphb_loaidichvu
 * @property int $pbh_id
 * @property int $glk_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Gialinhkien $gialinhkien
 * @property Phieubaohanh $phieubaohanh
 *
 * @package App\Models
 */
class Chitietphieubaohanh extends Model
{
	protected $table = 'chitietphieubaohanh';
	protected $primaryKey = 'ctphb_id';

	protected $casts = [
		'ctphb_soluong' => 'int',
		'ctphb_gia' => 'float',
		'pbh_id' => 'int',
		'glk_id' => 'int'
	];

	protected $fillable = [
		'ctphb_soluong',
		'ctphb_gia',
		'ctphb_loaidichvu',
		'pbh_id',
		'glk_id'
	];

	public function gialinhkien()
	{
		return $this->belongsTo(Gialinhkien::class, 'glk_id');
	}

	public function phieubaohanh()
	{
		return $this->belongsTo(Phieubaohanh::class, 'pbh_id');
	}
}
