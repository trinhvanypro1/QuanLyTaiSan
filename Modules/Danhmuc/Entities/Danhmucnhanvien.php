<?php

namespace Modules\Danhmuc\Entities;


use Illuminate\Database\Eloquent\Model;

class Danhmucnhanvien extends Model
{


    protected $table = 'danhmucnhanvien';

    protected $fillable = [
        'manhanvien',
        'tennhanvien',
        'hinhanh',
        'gioitinh',
        'ngaysinh',
        'cmnd',
        'tongiao',
        'dantoc',
        'sonha',
        'xaphuong',
        'quanhuyen',
        'tinhtp',
        'chuyenmon',
        'trinhdo',
        'phongban_id'
    ];
}
