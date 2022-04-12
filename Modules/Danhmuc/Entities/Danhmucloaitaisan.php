<?php

namespace Modules\Danhmuc\Entities;

// use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Danhmucloaitaisan extends Model
{
//    use Translatable;

    protected $table = 'danhmucloaitaisan';
//    public $translatedAttributes = [];
    protected $fillable = [
        'maloaitaisan',
        'loaitaisan',
    ];
}
