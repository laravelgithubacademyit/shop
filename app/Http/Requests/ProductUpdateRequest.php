<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash'],
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'cost' => ['required', 'min:1000', 'integer'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,mpeg', 'min:100', 'max:1024'],
            'description' => ['required']
        ];
    }
}
