<?php

namespace Modules\Danhmuctaisan\Entities;

//use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Nhaptaisan extends Model
{
  //  use Translatable;

    protected $table = 'taisan';
   // public $translatedAttributes = [];
    protected $fillable = [
        'mataisan',
        'tentaisan',
        'soluong',
        'soserial',
        'donvi',
        'phanloaitaisan',
        'loaitaisan_id',
        'muckhtbhangnam',
        'nhacungcap_id',
        'mota',
        'baohanh',
        'hangton',
        'ngaysudung',
        'tongtaisan',
        'hinhanh'
    ];
}
