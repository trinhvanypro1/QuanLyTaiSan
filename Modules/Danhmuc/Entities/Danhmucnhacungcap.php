<?php

namespace Modules\Danhmuc\Entities;

//use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Danhmucnhacungcap extends Model
{
    //use Translatable;

    protected $table = 'danhmucnhacungcap';
    //public $translatedAttributes = [];
    protected $fillable = [
        'manhacungcap',
        'tennhacungcap',
        'diachi'
    ];
}
