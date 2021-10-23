<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietbinhluan
 * 
 * @property int $ctbl_id
 * @property string $ctbl_noidung
 * @property float|null $ctbl_danhgiasao
 * @property int|null $ctbl_idrep
 * @property int $bl_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Binhluan $binhluan
 *
 * @package App\Models
 */
class Chitietbinhluan extends Model
{
	protected $table = 'chitietbinhluan';
	protected $primaryKey = 'ctbl_id';

	protected $casts = [
		'ctbl_danhgiasao' => 'float',
		'ctbl_idrep' => 'int',
		'bl_id' => 'int'
	];

	protected $fillable = [
		'ctbl_noidung',
		'ctbl_danhgiasao',
		'ctbl_idrep',
		'bl_id'
	];

	public function binhluan()
	{
		return $this->belongsTo(Binhluan::class, 'bl_id');
	}
}
