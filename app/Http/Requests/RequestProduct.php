<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // name trong create nhap thong tin ô input/ kiem tra loi
            'pro_name' => 'required|unique:products,pro_name,' . $this->id,
            'pro_category_id' => 'required',
            'pro_price' => 'required',
            'pro_content' => 'required',
        ];
    }
    // hien thi loi product
    public function messages()
    {
        return [
            'pro_name.required' => 'Trường này không được bỏ trống',
            'pro_name.unique' => 'Trường này đã tồn tại',
            'pro_category_id.required' => 'Trường này không được bỏ trống',
            'pro_price.required' => 'Nhập giá cho sản phẩm',
            'pro_content.required' => 'Nhập nội dung cho sản phẩm',
        ];
    }
}
