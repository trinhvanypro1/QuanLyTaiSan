<?php

namespace Modules\Kiemke\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Nhapkiemke extends Model
{
    use Translatable;

    protected $table = 'kiemke__nhapkiemkes';
    public $translatedAttributes = [];
    protected $fillable = [];
}
