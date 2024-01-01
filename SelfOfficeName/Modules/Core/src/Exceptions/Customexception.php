<?php

namespace Selfofficename\Modules\Core\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Core\Http\Resources\BaseListCollection;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Customexception extends Exception
{
    /**
     * @param $exception
     * @return JsonResponse
     */
    public function message($exception): JsonResponse
    {
        return (new BaseListCollection(collect(['message' => $exception->getMessage()])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
