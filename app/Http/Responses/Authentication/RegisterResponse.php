<?php

namespace App\Http\Responses\Authentication;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     @OA\Xml(name="RegisterResponse")
 * )
 * @var array
 */
class RegisterResponse extends JsonResponse
{
    /**
     * @OA\Property(
     *     property="data",
     *     type="object",
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         example="2"
     *     ),
     *     @OA\Property(
     *         property="name",
     *         type="string",
     *         example="John Doe"
     *     ),
     *     @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@email.com"
     *     ),
     * )
     *
     * @var array
     */
    public $data = [];
}
