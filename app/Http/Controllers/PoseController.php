<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoseStoreRequest;
use App\Http\Requests\PoseUpdateRequest;
use App\Models\Pose;
use App\Transformers\PoseShowTransformer;
use Illuminate\Http\JsonResponse;

class PoseController extends BaseController
{
    public function index()
    {
        return $this->collection(Pose::all(), new PoseShowTransformer());
    }

    public function show(int $id)
    {
        return $this->item(Pose::findOrFail($id), new PoseShowTransformer);
    }

    public function post(PoseStoreRequest $request)
    {
        return Pose::create($request->all());
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

}
