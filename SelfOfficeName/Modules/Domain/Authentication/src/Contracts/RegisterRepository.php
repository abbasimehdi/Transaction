<?php

namespace Selfofficename\Modules\Domain\Authentication\Contracts;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Core\Http\Contracts\BaseRepository;
use Selfofficename\Modules\Core\Http\Resources\BaseListCollection;
use Selfofficename\Modules\InfraStructure\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegisterRepository extends BaseRepository
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
    public function register($data): JsonResponse
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'     => $data['email'],
            'mobile'     => $data['mobile'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('API Token')->accessToken;

        return (new BaseListCollection(collect(['token' => $token])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }
}
