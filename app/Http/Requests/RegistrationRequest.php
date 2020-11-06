<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class RegistrationRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
    }
}
