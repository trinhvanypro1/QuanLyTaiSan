<?php

namespace Modules\Danhmuc\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDanhmucnhacungcapRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'manhacungcap'=>'required|unique:danhmucnhacungcap',
            'tennhacungcap'=>'required',
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
            'manhacungcap.unique'=>'Mã Nhà Cung Cấp là duy nhất. Vui lòng nhập lại!',
            'manhacungcap.required'=>'Vui lòng nhập Mã Nhà Cung Cấp!',
            'tennhacungcap.required'=>'Vui lòng nhập Tên Nhà Cung Cấp!',
            'diachi.required'=>'Vui lòng nhập Địa Chỉ!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
