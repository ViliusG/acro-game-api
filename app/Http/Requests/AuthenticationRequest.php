<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class AuthenticationRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
