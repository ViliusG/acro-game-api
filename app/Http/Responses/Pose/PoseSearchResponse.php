<?php

namespace App\Http\Responses\Pose;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     @OA\Xml(name="PoseSearchResponse")
 * )
 * @var array
 */
class PoseSearchResponse extends JsonResponse
{
    /**
     * @OA\Property(
     *     property="data",
     *     type="array",
     *     @OA\Items(
     *          @OA\Property(
     *              property="id",
     *              type="integer",
     *              example="2"
     *          ),
     *          @OA\Property(
     *              property="name",
     *              type="string",
     *              example="Bob"
     *          ),
     *     )
     * )
     *
     * @var array
     */
    public $data = [];
}
