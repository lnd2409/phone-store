<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khohang
 * 
 * @property int $khohang_id
 * @property string $khohang_tensnapham
 * @property int $khohang_soluongnhap
 * @property int|null $khohang_soluongxuat
 * @property int $ncc_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Nhacungcap $nhacungcap
 *
 * @package App\Models
 */
class Khohang extends Model
{
	protected $table = 'khohang';
	protected $primaryKey = 'khohang_id';

	protected $casts = [
		'khohang_soluongnhap' => 'int',
		'khohang_soluongxuat' => 'int',
		'ncc_id' => 'int'
	];

	protected $fillable = [
		'khohang_tensnapham',
		'khohang_soluongnhap',
		'khohang_soluongxuat',
		'ncc_id'
	];

	public function nhacungcap()
	{
		return $this->belongsTo(Nhacungcap::class, 'ncc_id');
	}
}
