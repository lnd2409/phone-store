<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quantri
 * 
 * @property int $qt_id
 * @property string $qt_ten
 * @property string|null $qt_sdt
 * @property string|null $qt_email
 * @property string|null $qt_diachi
 * @property string|null $qt_gioitinh
 * @property int $qt_active
 * @property string $username
 * @property string $password
 * @property int $q_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Quyen $quyen
 * @property Collection|Binhluan[] $binhluans
 * @property Collection|Phieubaohanh[] $phieubaohanhs
 * @property Collection|Tintuc[] $tintucs
 *
 * @package App\Models
 */
class Quantri extends Model
{
	protected $table = 'quantri';
	protected $primaryKey = 'qt_id';

	protected $casts = [
		'qt_active' => 'int',
		'q_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'qt_ten',
		'qt_sdt',
		'qt_email',
		'qt_diachi',
		'qt_gioitinh',
		'qt_active',
		'username',
		'password',
		'q_id'
	];

	public function quyen()
	{
		return $this->belongsTo(Quyen::class, 'q_id');
	}

	public function binhluans()
	{
		return $this->hasMany(Binhluan::class, 'qt_id');
	}

	public function phieubaohanhs()
	{
		return $this->hasMany(Phieubaohanh::class, 'qt_id');
	}

	public function tintucs()
	{
		return $this->hasMany(Tintuc::class, 'qt_id');
	}
}
