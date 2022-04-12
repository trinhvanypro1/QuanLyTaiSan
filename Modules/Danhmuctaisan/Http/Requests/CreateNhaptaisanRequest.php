<?php

namespace Modules\Danhmuctaisan\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateNhaptaisanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [

            'tentaisan'=>'required',
            'hinhanh' => 'required|image',
            'soluong'=>'required',
            'soserial'=>'required|unique:taisan',
            'tongtaisan'=>'required',
            'muckhtbhangnam'=>'required',
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
            'tentaisan.required'=>'Vui lòng Nhập Tên Tài Sản!',
            'hinhanh.image'=>'Vui lòng Chọn Ảnh!',
            'soluong.required'=>'Vui lòng Nhập Số Lượng!',
            'soserial.required'=>'Vui lòng Nhập Số Serial!',
            'soserial.unique'=>'Chỉ có 1 mã Serial. Vui lòng nhập lại!',
            'tongtaisan.required'=>'Vui lòng Nhập Giá!',
            'muckhtbhangnam.required'=>'Vui lòng Nhập Mức Khấu Hao TBHN!',
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
