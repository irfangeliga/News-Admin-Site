<?php
namespace App\Filament\Resources\News\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\News\NewsResource;
use App\Filament\Resources\News\Api\Requests\UpdateNewsRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = NewsResource::class;
    protected static string $permission = 'Update:News';

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update News
     *
     * @param UpdateNewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateNewsRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}