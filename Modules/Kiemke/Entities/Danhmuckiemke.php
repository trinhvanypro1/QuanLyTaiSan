<?php

namespace Modules\Kiemke\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Danhmuckiemke extends Model
{
    use Translatable;

    protected $table = 'kiemke__danhmuckiemkes';
    public $translatedAttributes = [];
    protected $fillable = [];
}
