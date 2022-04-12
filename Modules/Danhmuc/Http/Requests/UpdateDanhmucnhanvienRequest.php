<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateDanhmucnhanvienRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'manhanvien'=>'required',
            'tennhanvien'=>'required',
            'diachi'=>'required'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'manhanvien.required'=>'Vui lòng nhập Mã Nhân Viên!',
            'tennhanvien.required'=>'Vui lòng nhập Tên Nhân Viên!',
            'diachi.required'=>'Vui lòng nhập Địa Chỉ!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
