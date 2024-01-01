<?php

namespace Selfofficename\Modules\Domain\Transaction\Services;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Domain\Transaction\Contracts\TransactionInterface;
use Selfofficename\Modules\Domain\Transaction\Contracts\TransactionRepository;

class TransactionService implements TransactionInterface

{
    /**
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function transaction(array $data): \Illuminate\Http\JsonResponse
    {
        return $this->transactionRepository->transaction($data);
    }

    /**
     * @return JsonResponse
     */
    public function mostTransaction(): JsonResponse
    {
        return $this->transactionRepository->mostTransaction();
    }
}
