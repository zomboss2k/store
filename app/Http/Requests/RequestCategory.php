<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;// chon true de request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // ham dieu kien
    public function rules()
    {
        return [
            // name trong create nhap thong tin ô input/ kiem tra loi
            'name'=> 'required|unique:categories,c_name,'.$this->id,
            'icon'=> 'required'
        ];
    }
    // ham hien thi thong bao input
    public function messages()
    {
        return [
            'name.required'=>'Trường này không được bỏ trống',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'icon.required'=>'Trường này không được bỏ trống'
        ];
    }
}
