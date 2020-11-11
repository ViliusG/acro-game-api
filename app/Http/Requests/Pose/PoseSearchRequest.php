<?php

namespace App\Http\Requests\Pose;

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
