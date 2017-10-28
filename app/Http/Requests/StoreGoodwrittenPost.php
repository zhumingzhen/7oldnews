<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodwrittenPost extends FormRequest
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
            'describe' => 'bail|required',
            'account' => 'bail|required',
            'password' => 'bail|required|min:6',
            'operation' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'describe.required' => ':attribute 是必须的',
            'account.required'  => ':attribute 是必须的',
            'password.required'  => ':attribute 是必须的',
            'password.min'  => ':attribute 最少 :min 位',
            'operation.required'  => ':attribute 是必须的',
        ];
    }
}
