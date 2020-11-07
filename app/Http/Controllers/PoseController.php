<?php

namespace App\Http\Controllers;

use App\Constants\PoseStatus;
use App\Http\Requests\PoseSearchRequest;
use App\Http\Requests\PoseStoreRequest;
use App\Http\Requests\PoseUpdateRequest;
use App\Models\Pose;
use App\Transformers\PoseMinimalTransformer;
use App\Transformers\PoseShowTransformer;
use Illuminate\Http\JsonResponse;

class PoseController extends BaseController
{
    public function index()
    {
        return $this->collection(Pose::active()->get(), new PoseShowTransformer);
    }

    public function getPendingPoses()
    {
        return $this->collection(Pose::pending()->get(), new PoseShowTransformer);
    }

    public function show(int $id)
    {
        return $this->item(Pose::findOrFail($id), new PoseShowTransformer);
    }

    public function post(PoseStoreRequest $request)
    {
        return $this->item(Pose::create($request->all()), new PoseShowTransformer);
    }

    public function update(PoseUpdateRequest $request, $id)
    {
        $pose = Pose::findOrFail($id);
        $pose->update($request->toArray());

        return $this->item(Pose::findOrFail($id), new PoseShowTransformer);
    }

    public function destroy($id)
    {
        Pose::findOrFail($id)->delete();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    public function search(PoseSearchRequest $request)
    {
        $poses = Pose::select('id', 'name')->where('name', 'like', '%' . $request->name . '%')->get();

        return $this->collection($poses, new PoseMinimalTransformer);
    }
}
