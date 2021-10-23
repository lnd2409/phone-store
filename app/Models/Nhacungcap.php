<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhacungcap
 * 
 * @property int $ncc_id
 * @property string $ncc_ten
 * @property string $ncc_sdt
 * @property string $ncc_email
 * @property string $ncc_diachi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Khohang[] $khohangs
 * @property Collection|Sanpham[] $sanphams
 *
 * @package App\Models
 */
class Nhacungcap extends Model
{
	protected $table = 'nhacungcap';
	protected $primaryKey = 'ncc_id';

	protected $fillable = [
		'ncc_ten',
		'ncc_sdt',
		'ncc_email',
		'ncc_diachi'
	];

	public function khohangs()
	{
		return $this->hasMany(Khohang::class, 'ncc_id');
	}

	public function sanphams()
	{
		return $this->hasMany(Sanpham::class, 'ncc_id');
	}
}
