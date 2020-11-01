<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PoseStoreRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'difficulty' => 'required|integer',
            'type' => 'required|integer',
            'image_url' => 'required|url',
            'people_count' => 'integer',
            'description' => 'string'
        ];
    }
}
