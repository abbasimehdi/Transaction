<?php

namespace Selfofficename\Modules\Domain\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Selfofficename\Modules\Domain\Transaction\Rules\CardNumberValidation;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckCardbalance;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMaxTransactionAmount;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMinTransactionAmount;

class TransactionRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            "source_card_number"        => [
                'bail',
                'required',
                "exists:cards,number",
                "min:16",
                "max:16",
                new CardNumberValidation(),
                new CheckCardbalance()
            ],
            "amount"                    => [
                'bail',
                'required',
                new CheckMinTransactionAmount(),
                new CheckMaxTransactionAmount(),
                new CheckCardbalance()
            ],
            "destination_card_number"   => [
                'bail',
                'required',
                "min:16",
                "max:16",
                new CardNumberValidation(),
            ],
            "cvv2"                      => "required|min:3|max:5",
            "expired_date"              => "required",
        ];
    }
}
