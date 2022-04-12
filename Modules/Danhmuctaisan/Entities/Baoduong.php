<?php

namespace Modules\Danhmuctaisan\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Baoduong extends Model
{
    use Translatable;

    protected $table = 'danhmuctaisan__baoduongs';
    public $translatedAttributes = [];
    protected $fillable = [];
}
