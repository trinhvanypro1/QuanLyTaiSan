<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDanhmucloaitaisanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'maloaitaisan' =>'required|unique:danhmucloaitaisan',
            'loaitaisan' => 'required'
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
            'maloaitaisan.required'=> 'Vui lòng nhập Mã Tài Sản!',
            'maloaitaisan.unique'=> 'Mã loại tài sản là duy nhất. Vui lòng nhập lại!',
            'loaitaisan.required'=> 'Vui lòng nhập Loại Tài Sản!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
