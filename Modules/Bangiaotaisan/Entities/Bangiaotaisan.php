<?php

namespace Modules\Bangiaotaisan\Entities;


use Illuminate\Database\Eloquent\Model;

class Bangiaotaisan extends Model
{


    protected $table = 'bangiaotaisan';
    protected $fillable = [
        'ma_ban_giao',
        'hop_dong_ban_giao',
        'loai_ban_giao',
        'nhanvienbangiao',
        'phongbannhantaisan_id',
        'nhanviennhantaisan_id',
        'taisan_id',
        'so_luong_ban_giao',
        'tinh_trang',
        'ngay_ban_giao'
    ];
    
}
