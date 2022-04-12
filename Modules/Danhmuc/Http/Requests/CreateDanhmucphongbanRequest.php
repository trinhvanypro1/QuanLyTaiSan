<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDanhmucphongbanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'maphongban' =>'required|unique:danhmucphongban',
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
            'maphongban.unique'=> 'Mã Phòng Ban là duy nhất. Vui lòng nhập lại!',
            'tenphongban.required'=> 'Vui lòng nhập Tên Phòng Ban!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
