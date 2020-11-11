<?php

namespace App\Transformers;

use App\Models\Pose;
use League\Fractal\TransformerAbstract;

/**
 * @OA\Schema(
 *     @OA\Xml(name="PoseShowTransformer")
 * )
 * @var array
 */
class PoseShowTransformer extends TransformerAbstract
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
     *         example="Bob"
     *     ),
     *     @OA\Property(
     *         property="difficulty",
     *         type="integer",
     *         example="2"
     *     ),
     *     @OA\Property(
     *         property="type",
     *         type="integer",
     *         example="2"
     *     ),
     *     @OA\Property(
     *         property="image_url",
     *         type="string",
     *         example="www.best-website.com"
     *     ),
     *      @OA\Property(
     *         property="people_count",
     *         type="integer",
     *         example="2"
     *     ),
     *      @OA\Property(
     *         property="description",
     *         type="string",
     *         example="Point! "
     *     ),
     *      @OA\Property(
     *         property="status",
     *         type="integer",
     *         example="1"
     *     )
     * )
     *
     * @return array
     * @var array
     */
    public function transform(Pose $pose){
        return[
            'id' => $pose->id,
            'name' => $pose->name,
            'difficulty' => $pose->difficulty,
            'type' => $pose->type,
            'image_url' => $pose->image_url,
            'people_count' => $pose->people_count,
            'description' => $pose->description,
            'status' => $pose->status
        ];
    }
}
