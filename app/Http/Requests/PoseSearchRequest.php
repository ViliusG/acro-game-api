<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PoseSearchRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'name' => 'string|required|min:3',
        ];
    }
}
