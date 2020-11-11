<?php

namespace App\Http\Requests\Pose;

use Pearl\RequestValidate\RequestAbstract;

/**
 * @OA\Schema(
 *     @OA\Xml(name="PoseStoreRequest")
 * )
 */
class PoseUpdateRequest extends RequestAbstract
{
    /**
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     example="Reverse Star",
     *     required=true
     * ),
     * @OA\Property(
     *     property="difficulty",
     *     type="ingeger",
     *     example=1
     * ),
     * @OA\Property(
     *     property="type",
     *     type="ingeger",
     *     example=1
     * ),
     * @OA\Property(
     *     property="image_url",
     *     type="string",
     *     example="www.mickevičius.lt  "
     * ),
     * @OA\Property(
     *    property="people_count",
     *    type="integer",
     *    example="2"
     * ),
     * @OA\Property(
     *    property="description",
     *    type="string",
     *    example="Point!"
     * ),
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'difficulty' => 'integer',
            'type' => 'integer',
            'people_count' => 'integer',
            'description' => 'string'
        ];
    }
}
