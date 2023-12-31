<?php

namespace Selfofficename\Modules\Domain\Authentication\Http\Controllers;

use Selfofficename\Modules\Domain\Authentication\Contracts\LoginInterface;
use Selfofficename\Modules\Domain\Authentication\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Selfofficename\Modules\InfraStructure\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * @param LoginInterface $loginInterface
     */
    public function __construct(
        LoginInterface $loginInterface
    ) {
        $this->loginInterface = $loginInterface;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->loginInterface->login($request->all());
    }
}
