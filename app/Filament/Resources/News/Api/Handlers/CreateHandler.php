<?php
namespace App\Filament\Resources\News\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\News\NewsResource;
use App\Filament\Resources\News\Api\Requests\CreateNewsRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = NewsResource::class;
    protected static string $permission = 'Create:News';

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create News
     *
     * @param CreateNewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateNewsRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}