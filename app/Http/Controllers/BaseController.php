<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Routing\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\TransformerAbstract;

/**
 * @OA\Info(
 *   title="Acro Game - API",
 *  version="1.0.0",
 *  @OA\Contact(
 *    email="viliusgrizas@gmail.com",
 *    name="Vilius Grižas"
 *  )
 * )
 */
class BaseController extends Controller
{
    public function item(Model $model, TransformerAbstract $transformer)
    {
        $resource = new Item($model, $transformer);

        return $this->manager()->createData($resource);
    }

    public function collection(Collection $model, TransformerAbstract $transformer)
    {
        $resource = new FractalCollection($model, $transformer);

        return $this->manager()->createData($resource);
    }

    private function manager()
    {
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        return $manager;
    }
}
