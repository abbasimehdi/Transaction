<?php

namespace Selfofficename\Modules\Domain\Transaction\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;

class CheckMinTransactionAmount implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (
            $value < config('transactionSetting.settings.min')
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
        return __('The min amount is '. config('transaction.settings.min'). ' rial');
    }
}
