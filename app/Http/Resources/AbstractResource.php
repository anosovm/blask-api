<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AbstractResource extends JsonResource
{
    public static function collectionWithLoadMissing($collection): AnonymousResourceCollection
    {
        /** @var Model $model */
        $model = $collection->first();

        if ($model) {
            (new static($model))->toArray(null);

            $collection->loadMissing(array_keys($model->getRelations()));
        }

        return parent::collection($collection);
    }
}
