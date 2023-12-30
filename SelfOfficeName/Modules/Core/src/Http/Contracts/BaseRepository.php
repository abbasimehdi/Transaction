<?php

namespace Selfofficename\Modules\Core\Http\Contracts;

use http\Env\Request;
use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Core\Http\Resources\BaseListCollection;
use Selfofficename\Modules\Core\Models\Schemas\Constants\BaseConstants;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    abstract public function model(): mixed;

    protected mixed $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return (new BaseListCollection(
            collect($this->model->paginate(\request()->query('limit') ?? BaseConstants::LIMIT), ResponseAlias::HTTP_OK)
        ))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param $request
     * @param  int  $limit
     * @return mixed
     */
    public function paginate($request, int $limit = BaseConstants::LIMIT): JsonResponse
    {
        return (new BaseListCollection(collect($this->model->orderBy('id', 'desc')
            ->paginate(\request()->query('limit') ?? $limit))))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param $col
     * @param $value
     * @param  int  $limit
     * @return mixed
     */
    public function getBy($col, $value, int $limit = BaseConstants::LIMIT): JsonResponse
    {
        return response()->json($this->model->where($col, $value)->limit($limit)->get(), ResponseAlias::HTTP_OK);
    }

    /**
     * @param  array  $data
     * @return JsonResponse
     */
    public function create(array $data): JsonResponse
    {
        return (new BaseListCollection(collect($this->model->create($data))))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function find(int $id): JsonResponse
    {
        return (new BaseListCollection(collect($this->model->findOrFail($id))))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param  int  $id
     * @param  array  $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        return (new BaseListCollection(collect($this->model->findOrfail($id)->update($data))))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_ACCEPTED);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        return (new BaseListCollection(collect($this->model->findOrfail($id)->delete())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function exists(int $id): JsonResponse
    {
        return response()->json($this->model->where('id', $id)->exists(), ResponseAlias::HTTP_OK);
    }
}
