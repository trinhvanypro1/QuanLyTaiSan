<?php

namespace Modules\Danhmuctaisan\Entities;

use Illuminate\Database\Eloquent\Model;

class Baoduong extends Model
{

    protected $table = 'baoduong';
    protected $fillable = [
        'taisan_id',
        'loaibaoduong',
        'nhanvienbaoduong_id',
        'nhacungcap_id',
        'ngaybaoduong',
        'ngayketthucbaoduong',
        'motahuhai'
    ];
}
