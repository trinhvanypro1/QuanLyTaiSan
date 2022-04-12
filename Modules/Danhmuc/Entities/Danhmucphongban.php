<?php

namespace Modules\Danhmuc\Entities;

//use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Danhmucphongban extends Model
{
   // use Translatable;

    protected $table = 'danhmucphongban';
    //public $translatedAttributes = [];
    protected $fillable = [
        'maphongban',
        'tenphongban'
    ];
}
