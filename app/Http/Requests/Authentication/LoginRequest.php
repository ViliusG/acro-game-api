<?php

namespace App\Http\Requests\Authentication;

use Pearl\RequestValidate\RequestAbstract;

/**
 * @OA\Schema(
 *     @OA\Xml(name="LoginRequest")
 * )
 */
class LoginRequest extends RequestAbstract
{
    /**
     * @OA\Property(
     *     property="email",
     *     type="string",
     *     example="user@email.com"
     * ),
     * @OA\Property(
     *     property="password",
     *     type="string",
     *     example="dupadupa666"
     * ),
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
