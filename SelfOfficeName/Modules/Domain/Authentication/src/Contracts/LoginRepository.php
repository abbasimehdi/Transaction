<?php

namespace Selfofficename\Modules\Domain\Authentication\Contracts;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Selfofficename\Modules\Core\Http\Contracts\BaseRepository;
use Selfofficename\Modules\Core\Http\Resources\BaseListCollection;
use Selfofficename\Modules\InfraStructure\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return User::class;
    }

    /**
     * @param int $passportId
     * @return JsonResponse
     */
    public function login($data): JsonResponse
    {
        $this->isAttempt($data);


        return (new BaseListCollection(collect(
            [
                'token' => auth()->user()->createToken('API Token')->accessToken
            ]
        )))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param array $data
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response|void
     */
    private function isAttempt(array $data)
    {
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.Please try again']);
        }
    }
}
