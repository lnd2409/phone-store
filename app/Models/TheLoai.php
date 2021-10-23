<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $tl_id
 * @property string $tl_ten
 * @property string $tl_tenkhongdau
 * @property int $tl_trangthai
 * @property string $created_at
 * @property string $updated_at
 * @property Sanpham[] $sanphams
 * @property Thuoctinh[] $thuoctinhs
 * @property Thuoctinhsanpham[] $thuoctinhsanphams
 */
class TheLoai extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theloai';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'tl_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tl_id','tl_ten', 'tl_tenkhongdau', 'tl_trangthai', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanphams()
    {
        return $this->hasMany('App\Models\Sanpham', 'tl_id', 'tl_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function thuoctinhs()
    {
        return $this->belongsToMany('App\Thuoctinh', null, 'tl_id', 'tt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thuoctinhsanphams()
    {
        return $this->hasMany('App\Thuoctinhsanpham', 'tl_id', 'tl_id');
    }
}