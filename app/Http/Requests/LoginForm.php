<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class LoginForm extends RequestController
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
            'username' => 'required',
            'password' => 'required',
            'captcha' => ['required', 'captcha'],
        ];
    }
    public function messages()
    {
        $message = [
            'username.required'      =>'username必须填写',
            'password.required'      =>'password必须填写!',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ];
        return $message;
    }
}
