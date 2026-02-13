<?php

namespace App\Filament\Resources\News\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\News\NewsResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\News\Api\Transformers\NewsTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = NewsResource::class;
    protected static string $permission = 'View:News';


    /**
     * Show News
     *
     * @param Request $request
     * @return NewsTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new NewsTransformer($query);
    }
}
