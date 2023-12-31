<?php

namespace Selfofficename\Modules\Domain\Transaction\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Domain\Transaction\Contracts\TransactionInterface;
use Selfofficename\Modules\Domain\Transaction\Http\Requests\TransactionRequest;
use Selfofficename\Modules\InfraStructure\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function __construct(
        TransactionInterface $transactionInterface
    ) {
        $this->transactionInterface = $transactionInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->transactionInterface->mostTransaction();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        return $this->transactionInterface->transaction($request->all());
    }
}
