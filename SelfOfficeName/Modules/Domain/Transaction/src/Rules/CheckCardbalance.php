<?php

namespace Selfofficename\Modules\Domain\Transaction\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;
use Selfofficename\Modules\Domain\Card\Models\Card;

class CheckCardbalance implements Rule
{
    protected $amount = 0;

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->amount = Card::query()->where('number', \request()['source_card_number'])->first()?->amount;

        if (
            \request()['amount'] > $this->amount
        ) {
            return false;
        }

        return true;
    }

    /**
     * @return Application|array|string|Translator|null
     */
    public function message(): Application|array|string|Translator|null
    {
        return __('The max amount for transaction is'. $this->amount. ' rial');
    }
}
