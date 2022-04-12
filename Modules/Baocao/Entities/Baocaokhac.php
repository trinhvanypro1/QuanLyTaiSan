<?php

namespace Modules\Baocao\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Baocaokhac extends Model
{
    use Translatable;

    protected $table = 'baocao__baocaokhacs';
    public $translatedAttributes = [];
    protected $fillable = [];
}
