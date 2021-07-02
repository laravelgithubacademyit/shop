<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'code' => ['required',  'min:4', 'unique:offers,code'],
            'starts_at' => ['required', 'date','before:expires_at'],
            'expires_at' => ['required', 'date','after:starts_at'],
        ];
    }
}
