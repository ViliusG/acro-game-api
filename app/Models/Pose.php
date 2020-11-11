<?php

namespace App\Models;

use App\Constants\PoseStatus;
use Illuminate\Database\Eloquent\Model;

class Pose extends Model
{
    /**
     * @OA\Schema(
     *   schema="Poses Schema",
     *   title="Poses",
     *   description="Poses of acro yoga for the game",
     *   @OA\Property(
     *     property="id",
     *     description="id",
     *     @OA\Schema(
     *          type="integer",
     *          example="12")
     *  ),
     *   @OA\Property(
     *     property="name",
     *     description="name of the pose",
     *     @OA\Schema(
     *          type="string",
     *          example="Reverse Bird")
     *  ),
     *   @OA\Property(
     *     property="difficulty",
     *     description="Level of difficulty for the pose. Goes from 1 to 3, 1 being the easiest.",
     *     @OA\Schema(
     *          type="int",
     *          example="2")
     *  ),
     *   @OA\Property(
     *     property="type",
     *     description="Type of the pose. Can be L-base, standing, counter-balance etc",
     *     @OA\Schema(
     *          type="integer",
     *          example="3")
     *  ),
     *   @OA\Property(
     *     property="image_url",
     *     description="Url to the image of the pose",
     *     @OA\Schema(
     *          type="string",
     *          example="https://peaceloveacroyoga.com/wp-content/uploads/2016/04/11903872_10153514400204707_1237292647090756664_n-300x300.jpg")
     *  ),
     *   @OA\Property(
     *     property="people_count",
     *     description="Shows how many people are participating in a pose",
     *     @OA\Schema(
     *          type="integer",
     *          example="2")
     *  ),
     *   @OA\Property(
     *     property="description",
     *     description="Any additional comments for the poase",
     *     @OA\Schema(
     *          type="string",
     *          example="Point your toes and keep the hips high,")
     *  ),
     *   @OA\Property(
     *     property="status",
     *     description="Shows whether the pose is active and being displayed to the users. 1-Active, 2-Pending confirmation (meaning it was recently submitted), 3-Disabled",
     *     @OA\Schema(
     *          type="integer",
     *          example="2")
     *  )
     * )
     */
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description', 'difficulty', 'type', 'image_url', 'people_count', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', PoseStatus::ACTIVE);
    }

    public function scopePending($query)
    {
        return $query->where('status', PoseStatus::PENDING);
    }
}
