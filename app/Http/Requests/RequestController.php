<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class RequestController extends FormRequest
{
    public function failedValidation($validator)
    {
        $error= $validator->errors()->all();
        throw  new HttpResponseException(response()->json(['code'=>1,'msg'=>$error[0]]));
    }
}
