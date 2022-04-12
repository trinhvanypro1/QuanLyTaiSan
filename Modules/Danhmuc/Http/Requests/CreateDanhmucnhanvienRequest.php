<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDanhmucnhanvienRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'manhanvien'=>'required|unique:danhmucnhanvien',
            'tennhanvien'=>'required'
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
            'manhanvien.unique'=>'Mã Nhân Viên là duy nhất. Vui lòng nhập lại!',
            'manhanvien.required'=>'Vui lòng nhập Mã Nhân Viên!',
            'tennhanvien.required'=>'Vui lòng nhập Tên Nhân Viên!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
