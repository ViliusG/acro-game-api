<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pose\PoseSearchRequest;
use App\Http\Requests\Pose\PoseStoreRequest;
use App\Http\Requests\Pose\PoseUpdateRequest;
use App\Models\Pose;
use App\Transformers\PoseMinimalTransformer;
use App\Transformers\PoseShowTransformer;
use Illuminate\Http\JsonResponse;
use League\Fractal\Scope;

class PoseController extends BaseController
{
    /**
     * @OA\Get(
     *   path="/poses",
     *   summary="Logs in the user, returns api token on success",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
     *          in="header",
     *          required=true,
     *          description="Generated user token",
     *          example="uIPdxJeJiFyUnUnkhVE7eAgOS6EADpL7nEaWrsGl4rPENRAuyfrrMkBns0ndqEhlmWlTfSxl5Dnbfaf0ViYQ8b1vnbch",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/PoseIndexResponse")
     *     )
     * )
     */
    public function index()
    {
        return $this->collection(Pose::active()->get(), new PoseShowTransformer);
    }

    /**
     * @OA\Get(
     *   path="/poses/pending",
     *   summary="All the pending poses. Only for admins.",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
     *          in="header",
     *          required=true,
     *          description="Generated user token",
     *          example="uIPdxJeJiFyUnUnkhVE7eAgOS6EADpL7nEaWrsGl4rPENRAuyfrrMkBns0ndqEhlmWlTfSxl5Dnbfaf0ViYQ8b1vnbch",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/GetPendingPosesResponse")
     *     )
     * )
     */
    public function getPendingPoses()
    {
        return $this->collection(Pose::pending()->get(), new PoseShowTransformer);
    }

    /**
     * @OA\Get(
     *   path="/poses/{id}",
     *   summary="Get a specific pose by ID",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
     *          in="header",
     *          required=true,
     *          description="Generated user token",
     *          example="uIPdxJeJiFyUnUnkhVE7eAgOS6EADpL7nEaWrsGl4rPENRAuyfrrMkBns0ndqEhlmWlTfSxl5Dnbfaf0ViYQ8b1vnbch",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/PoseShowResponse")
     *     )
     * )
     * @param int $id
     * @return Scope
     */
    public function show(int $id)
    {
        return $this->item(Pose::findOrFail($id), new PoseShowTransformer);
    }

    /**
     * @OA\Post(
     *   path="/poses",
     *   summary="Upload a pose to database. Will automatically have status 2 - Pending",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
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
     *         @OA\JsonContent(ref="#/components/schemas/PoseStoreRequest"),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/PosePostResponse")
     *     )
     * )
     * @param PoseStoreRequest $request
     * @return Scope
     */
    public function post(PoseStoreRequest $request)
    {
        return $this->item(Pose::create($request->all()), new PoseShowTransformer);
    }

    /**
     * @OA\Put(
     *   path="/poses/{id}",
     *   summary="Updates a pose (can be used for enabling/changing status/disabling (functions as deleting)",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
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
     *         @OA\JsonContent(ref="#/components/schemas/PoseUpdateRequest"),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/PoseUpdateResponse")
     *     )
     * )
     * @param PoseUpdateRequest $request
     * @param $id
     * @return Scope
     */
    public function update(PoseUpdateRequest $request, $id)
    {
        $pose = Pose::findOrFail($id);
        $pose->update($request->toArray());

        return $this->item(Pose::findOrFail($id), new PoseShowTransformer);
    }

    public function destroy($id)
    {
        //no need for a destroy function
        return null;
//        Pose::findOrFail($id)->delete();

//        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @OA\Get(
     *   path="/poses/search",
     *   summary="Searches the database for poses by name. Minimum length of search term is 3 letters.",
     *   tags={"Poses"},
     *     @OA\Parameter(
     *          name="api-key",
     *          in="header",
     *          required=true,
     *          description="Generated user token",
     *          example="uIPdxJeJiFyUnUnkhVE7eAgOS6EADpL7nEaWrsGl4rPENRAuyfrrMkBns0ndqEhlmWlTfSxl5Dnbfaf0ViYQ8b1vnbch",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/PoseSearchResponse")
     *     )
     * )
     * @param PoseSearchRequest $request
     * @return Scope
     */
    public function search(PoseSearchRequest $request)
    {
        $poses = Pose::select('id', 'name')->where('name', 'like', '%' . $request->name . '%')->get();

        return $this->collection($poses, new PoseMinimalTransformer);
    }
}
