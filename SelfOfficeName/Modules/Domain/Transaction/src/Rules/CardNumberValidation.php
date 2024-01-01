<?php

namespace Selfofficename\Modules\Domain\Transaction\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;
use Selfofficename\Modules\Domain\Card\Models\Card;

class CardNumberValidation implements Rule
{
    protected $cardNumber = "";

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->cardNumber = $value;

        $cardToArr = str_split($value);
        $cardTotal = 0;
        for($i = 0; $i<16; $i++) {
            $c = (int)$cardToArr[$i];
            if($i % 2 === 0) {
                $cardTotal += (($c * 2 > 9) ? ($c * 2) - 9 : ($c * 2));
            } else {
                $cardTotal += $c;
            }
        }

        return $cardTotal % 10 === 0;
    }

    /**
     * @return Application|array|string|Translator|null
     */
    public function message(): Application|array|string|Translator|null
    {
        return __("source card number $this->cardNumber is not valid");
    }
}
