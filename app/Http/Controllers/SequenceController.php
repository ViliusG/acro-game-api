<?php

namespace App\Http\Controllers;

use App\Constants\Type;
use App\Http\Requests\GenerateSequenceRequest;
use App\Models\Pose;
use App\Transformers\SequenceTransformer;
use League\Fractal\Scope;

class SequenceController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @param GenerateSequenceRequest $request
     * @return Scope
     */
    public function generate(GenerateSequenceRequest $request)
    {
        $type = empty($request->type) ? Type::LBASING : $request->type;
        $peopleCount = empty($request->people_count) ? 2 : $request->people_count;
        $poses = Pose::inRandomOrder()
            ->where([
                ['difficulty', '<=', $request->difficulty],
                ['type', $type],
                ['people_count', $request->$peopleCount]
            ])->limit($request->length)
            ->get();

        return $this->collection($poses, new SequenceTransformer);
    }
}
