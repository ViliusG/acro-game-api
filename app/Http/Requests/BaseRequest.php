<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BaseRequest
{
    public function validate($input)
    {
        $this->throwExceptions($this->lookForExceptions($input));
    }

    public function lookForExceptions($request)
    {
        return Validator::make($request, $this->rules());
    }

    public function throwExceptions($validator)
    {
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->messages());
        }
    }
}
