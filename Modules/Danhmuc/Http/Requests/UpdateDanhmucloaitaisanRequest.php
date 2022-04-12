<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateDanhmucloaitaisanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'maloaitaisan' =>'required',
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
            'loaitaisan.required'=> 'Vui lòng nhập Loại Tài Sản!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
