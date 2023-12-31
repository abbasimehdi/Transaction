<?php

namespace Selfofficename\Modules\Domain\Transaction\Contracts;

use Illuminate\Http\JsonResponse;

interface TransactionInterface
{
    public function transaction(array $data): JsonResponse;
    public function mostTransaction(): JsonResponse;
}
