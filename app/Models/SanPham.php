<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $sp_id
 * @property integer $tl_id
 * @property integer $ncc_id
 * @property integer $bh_id
 * @property string $sp_ten
 * @property int $sp_gia
 * @property int $sp_soluong
 * @property string $sp_mota
 * @property string $sp_tinhtrang
 * @property int $sp_trangthai
 * @property string $created_at
 * @property string $updated_at
 * @property Baohanh $baohanh
 * @property Nhacungcap $nhacungcap
 * @property Theloai $theloai
 * @property Bannersanpham[] $bannersanphams
 * @property Binhluan[] $binhluans
 * @property Chitietbolocsanpham[] $chitietbolocsanphams
 * @property Chitietkhuyenmaisanpham[] $chitietkhuyenmaisanphams
 * @property Donhang[] $donhangs
 * @property Hinhanhsanpham[] $hinhanhsanphams
 * @property SanphamThuoctinh[] $sanphamThuoctinhs
 * @property Slideranhsp[] $slideranhsps
 * @property Tintuc[] $tintucs
 */
class SanPham extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanpham';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'sp_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['sp_id','tl_id', 'ncc_id', 'bh_id', 'sp_ten', 'sp_gia', 'sp_soluong', 'sp_mota', 'sp_tinhtrang', 'sp_trangthai', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baohanh()
    {
        return $this->belongsTo('App\Baohanh', 'bh_id', 'bh_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhacungcap()
    {
        return $this->belongsTo('App\Nhacungcap', 'ncc_id', 'ncc_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theloai()
    {
        return $this->belongsTo('App\Models\Theloai', 'tl_id', 'tl_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bannersanphams()
    {
        return $this->hasMany('App\Bannersanpham', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function binhluans()
    {
        return $this->hasMany('App\Binhluan', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chitietbolocsanphams()
    {
        return $this->hasMany('App\Chitietbolocsanpham', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chitietkhuyenmaisanphams()
    {
        return $this->hasMany('App\Chitietkhuyenmaisanpham', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donhangs()
    {
        return $this->hasMany('App\Donhang', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hinhanhsanphams()
    {
        return $this->hasMany('App\Hinhanhsanpham', 'sp_id', 'sp_id');
    }

    /**
     * Get the hinhdaidien associated with the SanPham
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hinhdaidien()
    {
        return $this->hasOne(Hinhanhsanpham::class, 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanphamThuoctinhs()
    {
        return $this->hasMany('App\SanphamThuoctinh', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slideranhsps()
    {
        return $this->hasMany('App\Slideranhsp', 'sp_id', 'sp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tintucs()
    {
        return $this->hasMany('App\Tintuc', 'sp_id', 'sp_id');
    }
}