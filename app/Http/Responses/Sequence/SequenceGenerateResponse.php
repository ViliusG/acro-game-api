<?php

namespace App\Http\Responses\Sequence;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     @OA\Xml(name="SequenceGenerateResponse")
 * )
 * @var array
 */
class SequenceGenerateResponse extends JsonResponse
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
     *          @OA\Property(
     *              property="difficulty",
     *              type="integer",
     *              example="2"
     *          ),
     *          @OA\Property(
     *              property="type",
     *              type="integer",
     *              example="2"
     *          ),
     *          @OA\Property(
     *              property="image_url",
     *              type="string",
     *              example="www.best-website.com"
     *          ),
     *           @OA\Property(
     *              property="people_count",
     *              type="integer",
     *              example="2"
     *          ),
     *           @OA\Property(
     *              property="description",
     *              type="string",
     *              example="Point! "
     *          ),
     *           @OA\Property(
     *              property="status",
     *              type="integer",
     *              example="1"
     *          )
     *     )
     * )
     *
     * @var array
     */
    public $data = [];
}
