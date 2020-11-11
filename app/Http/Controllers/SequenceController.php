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
     * @OA\Post(
     *   path="/sequence/generate",
     *   summary="Generates a sequence according to parameters passed",
     *   tags={"Sequence"},
     *     @OA\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          description="Generated user token",
     *          example="uIPdxJeJiFyUnUnkhVE7eAgOS6EADpL7nEaWrsGl4rPENRAuyfrrMkBns0ndqEhlmWlTfSxl5Dnbfaf0ViYQ8b1vnbch",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
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
                ['difficulty', '<=', $request->difficulty],
                ['type', $type],
                ['people_count', $request->$peopleCount]
            ])->limit($request->length)
            ->get();

        return $this->collection($poses, new SequenceTransformer);
    }
}
