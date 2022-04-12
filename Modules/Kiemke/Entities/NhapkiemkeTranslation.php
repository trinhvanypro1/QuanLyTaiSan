<?php

namespace Modules\Kiemke\Entities;

use Illuminate\Database\Eloquent\Model;

class NhapkiemkeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'kiemke__nhapkiemke_translations';
}
