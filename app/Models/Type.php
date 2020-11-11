<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * @OA\Schema(
     *   schema="Type Schema",
     *   title="Types Model",
     *   description="Type of poses",
     *   @OA\Property(
     *     property="id",
     *     description="id",
     *     @OA\Schema(
     *          type="integer",
     *          example="12")
     *  ),
     *   @OA\Property(
     *     property="name",
     *     description="Name of the type",
     *     @OA\Schema(
     *          type="string",
     *          example="L-basing")
     *  )
     * )
     */

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'name', 'description'
    ];
}
