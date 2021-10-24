<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ncc_id
 * @property string $ncc_ten
 * @property string $ncc_sdt
 * @property string $ncc_email
 * @property string $ncc_diachi
 * @property string $created_at
 * @property string $updated_at
 * @property Khohang[] $khohangs
 * @property Sanpham[] $sanphams
 */
class NhaCungCap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nhacungcap';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ncc_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ncc_ten', 'ncc_sdt', 'ncc_email', 'ncc_diachi', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function khohangs()
    {
        return $this->hasMany('App\Models\Khohang', 'ncc_id', 'ncc_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanphams()
    {
        return $this->hasMany('App\Models\Sanpham', 'ncc_id', 'ncc_id');
    }
}
