<?php

namespace Selfofficename\Modules\Domain\Transaction\Contracts;

use Illuminate\Http\JsonResponse;

interface SendInterface
{
    public function send(): JsonResponse;
}
