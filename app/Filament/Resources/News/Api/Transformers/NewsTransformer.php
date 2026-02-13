<?php
namespace App\Filament\Resources\News\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\News;

/**
 * @property News $resource
 */
class NewsTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
