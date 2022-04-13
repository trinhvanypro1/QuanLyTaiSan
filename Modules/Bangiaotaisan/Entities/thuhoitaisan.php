<?php

namespace Modules\Bangiaotaisan\Entities;


use Illuminate\Database\Eloquent\Model;

class thuhoitaisan extends Model
{


    protected $table = 'thuhoitaisan';
    protected $fillable = [
        'mathuhoi',
        'ngaythuhoi',
        'nhanvienthuhoi_id',
        'mabophanbithuhoi_id',
        'nhanvienbithuhoi_id',
        'taisan_id',
        'soluong',
        'tinhtrang',
        'lydothuhoi'
    ];
}
