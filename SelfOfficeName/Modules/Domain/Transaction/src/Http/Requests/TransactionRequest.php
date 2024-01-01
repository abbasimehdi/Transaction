<?php

namespace Selfofficename\Modules\Domain\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Selfofficename\Modules\Core\Traits\ConvertNumberToEnglish;
use Selfofficename\Modules\Domain\Transaction\Rules\CardNumberValidation;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckCardbalance;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMaxTransactionAmount;
use Selfofficename\Modules\Domain\Transaction\Rules\CheckMinTransactionAmount;

class TransactionRequest extends FormRequest
{
    use ConvertNumberToEnglish;

    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'amount' => $this->convert2english($this->request->all()['amount']),
            'source_card_number' => $this->convert2english($this->request->all()['source_card_number']),
            'destination_card_number' => $this->convert2english($this->request->all()['destination_card_number']),
            'expired_date' => $this->convert2english($this->request->all()['expired_date']),
            'cvv2' => $this->convert2english($this->request->all()['cvv2']),
        ]);
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
