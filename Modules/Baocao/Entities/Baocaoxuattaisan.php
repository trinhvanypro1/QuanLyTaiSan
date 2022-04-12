<?php

namespace Modules\Baocao\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Baocaoxuattaisan extends Model
{
    use Translatable;

    protected $table = 'baocao__baocaoxuattaisans';
    public $translatedAttributes = [];
    protected $fillable = [];
}
