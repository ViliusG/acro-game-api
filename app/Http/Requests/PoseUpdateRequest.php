<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PoseUpdateRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'name' => 'string',
            'difficulty' => 'integer',
            'type' => 'integer',
            'people_count' => 'integer',
            'description' => 'string'
        ];
    }
}
