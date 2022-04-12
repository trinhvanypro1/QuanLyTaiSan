<?php

namespace Modules\Danhmuctaisan\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Suachua extends Model
{
    use Translatable;

    protected $table = 'danhmuctaisan__suachuas';
    public $translatedAttributes = [];
    protected $fillable = [];
}
