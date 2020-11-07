<?php

namespace App\Transformers;

use App\Models\Pose;
use League\Fractal\TransformerAbstract;


class PoseMinimalTransformer extends TransformerAbstract
{
    public function transform(Pose $pose){
        return[
            'id' => $pose->id,
            'name' => $pose->name
        ];
    }
}
