<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateDanhmucphongbanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'maphongban' =>'required',
            'tenphongban' =>'required'
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
            'maphongban.required'=> 'Vui lòng nhập Mã Phòng Ban!',
            'tenphongban.required'=> 'Vui lòng nhập Tên Phòng Ban!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
