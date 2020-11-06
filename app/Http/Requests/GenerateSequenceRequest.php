<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class GenerateSequenceRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            //type will default to L basing
            //people count will default to 2
            'difficulty' => 'required|integer',
            'type' => 'integer',
            'people_count' => 'integer',
            'length' => 'required|integer'
        ];
    }
}
