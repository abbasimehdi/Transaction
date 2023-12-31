<?php

namespace Selfofficename\Modules\Domain\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckCardbalance;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMaxTransactionAmount;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMinTransactionAmount;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "amount"                    => [
                'required',
                new CheckMinTransactionAmount(),
                new CheckMaxTransactionAmount(),
                new CheckCardbalance()
            ],
            "source_card_number"        => [
                'required',
                "exists:cards,number",
                new CheckCardbalance()
            ],
            "destination_card_number"   => "required|min:16|max:16",
            "cvv2"                      => "required|min:3|max:5",
            "expired_date"              => "required",
        ];
    }
}
