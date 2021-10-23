<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuoctinh
 * 
 * @property int $tt_id
 * @property string $tt_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Sanpham[] $sanphams
 * @property Collection|Theloai[] $theloais
 *
 * @package App\Models
 */
class Thuoctinh extends Model
{
	protected $table = 'thuoctinh';
	protected $primaryKey = 'tt_id';

	protected $fillable = [
		'tt_ten'
	];

	public function sanphams()
	{
		return $this->belongsToMany(Sanpham::class, 'sanpham_thuoctinh', 'tt_id', 'sp_id')
					->withPivot('sptt_giatri');
	}

	public function theloais()
	{
		return $this->belongsToMany(Theloai::class, 'theloai_thuoctinh', 'tt_id', 'tl_id');
	}
}
