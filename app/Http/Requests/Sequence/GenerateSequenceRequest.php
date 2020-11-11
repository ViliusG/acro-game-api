<?php

namespace App\Http\Requests\Sequence;

use Pearl\RequestValidate\RequestAbstract;

/**
 * @OA\Schema(
 *     @OA\Xml(name="GenerateSequenceRequest")
 * )
 */
class GenerateSequenceRequest extends RequestAbstract
{
    /**
     * @OA\Property(
     *     property="difficulty required",
     *     type="ingeger",
     *     example=1
     * ),
     * @OA\Property(
     *     property="type",
     *     type="ingeger",
     *     example=1
     * ),
     * @OA\Property(
     *    property="people_count",
     *    type="integer",
     *    example="2"
     * ),
     * @OA\Property(
     *    property="length - required",
     *    type="integer",
     *    example=10
     * ),
     */
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
