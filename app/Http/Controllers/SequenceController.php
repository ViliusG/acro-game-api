<?php

namespace App\Http\Controllers;

use App\Constants\Type;
use App\Http\Requests\Sequence\GenerateSequenceRequest;
use App\Models\Pose;
use App\Transformers\SequenceTransformer;
use League\Fractal\Scope;

class SequenceController extends BaseController
{

    /**
     * @OA\Get(
     *   path="/sequence/generate",
     *   summary="Generates a sequence according to parameters passed",
     *   tags={"Sequence"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/GenerateSequenceRequest"),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/SequenceGenerateResponse")
     *     )
     * )
     * @param GenerateSequenceRequest $request
     * @return Scope
     */
    public function generate(GenerateSequenceRequest $request)
    {
        $type = empty($request->type) ? Type::LBASING : $request->type;
        $peopleCount = empty($request->people_count) ? 2 : $request->people_count;
        $poses = Pose::inRandomOrder()
            ->where([
                ['difficulty', '<=',(int)  $request->difficulty],
                ['type', $type],
                ['people_count', $peopleCount]
            ])->limit($request->length)
            ->get();

        return $this->collection($poses, new SequenceTransformer);
    }
}
