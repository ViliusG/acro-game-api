<?php

namespace App\Http\Responses\Authentication;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     @OA\Xml(name="LoginResponse")
 * )
 * @var array
 */
class LoginResponse extends JsonResponse
{
    /**
     * @OA\Property(
     *     property="data",
     *     type="object",
     *     @OA\Property(
     *         property="token",
     *         type="string",
     *         example="avdsfgy6v34etbrteav"
     *     ),
     * )
     *
     * @var array
     */
    public $data = [];
}
