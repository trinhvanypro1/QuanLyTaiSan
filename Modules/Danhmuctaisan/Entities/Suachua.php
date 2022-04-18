<?php

namespace Modules\Danhmuctaisan\Entities;

use Illuminate\Database\Eloquent\Model;

class Suachua extends Model
{
    protected $table = 'suachua';

    protected $fillable = [
        'taisansuachua_id',
        'nhanviennhap_id',
        'nhacungcap_id',
        'tinhtrang',
        'ngaysuachua',
        'motahuhai'
    ];
}
