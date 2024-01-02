<?php

namespace Selfofficename\Modules\Domain\Transaction\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;

class CheckMaxTransactionAmount implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        if (
            $value > config('transaction.settings.max')
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
        return __('The max transfer amount for transactions is '. config('transaction.settings.max'). ' rial');
    }
}
