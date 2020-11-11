<?php

namespace App\Http\Requests\Authentication;

use Pearl\RequestValidate\RequestAbstract;

/**
 * @OA\Schema(
 *     @OA\Xml(name="RegisterRequest")
 * )
 */
class RegisterRequest extends RequestAbstract
{
    /**
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     example="John Doe"
     * ),
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
    }
}
