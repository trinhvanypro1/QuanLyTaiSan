<?php

namespace Modules\Baocao\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Baocaonhaptaisan extends Model
{
    use Translatable;

    protected $table = 'baocao__baocaonhaptaisans';
    public $translatedAttributes = [];
    protected $fillable = [];
}
