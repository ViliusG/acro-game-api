<?php

namespace App\Transformers;

use App\Models\Pose;
use League\Fractal\TransformerAbstract;


class PoseShowTransformer extends TransformerAbstract
{
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
