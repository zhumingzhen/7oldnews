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
            'describe.required' => 'describe 是必须的',
            'account.required'  => 'account 是必须的',
            'password.required'  => 'password 是必须的',
            'password.min'  => 'password 最少6为',
            'operation.required'  => 'operation 是必须的',
        ];
    }
}
