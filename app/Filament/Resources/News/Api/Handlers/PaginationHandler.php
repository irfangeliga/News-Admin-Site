<?php

namespace App\Filament\Resources\News\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\News\NewsResource;
use App\Filament\Resources\News\Api\Transformers\NewsTransformer;

class PaginationHandler extends Handlers
{
   public static string | null $uri = '/';
   public static string | null $resource = NewsResource::class;
   protected static string $permission = 'ViewAny:News';
   public static bool $public = true;



   /**
    * List of News
    *
    * @param Request $request
    * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    */
   public function handler()
   {
      $query = static::getEloquentQuery();

      $query = QueryBuilder::for($query)
         ->allowedFields($this->getAllowedFields() ?? [])
         ->allowedSorts($this->getAllowedSorts() ?? [])
         ->allowedFilters($this->getAllowedFilters() ?? [])
         ->allowedIncludes($this->getAllowedIncludes() ?? [])
         ->paginate(request()->query('per_page'))
         ->appends(request()->query());

      return NewsTransformer::collection($query);
   }
}
