<?php

namespace Selfofficename\Modules\Core\Models\Schemas\Constants;

class BaseConstants
{
    const DEFAULT_USER = 1;

    const LIMIT = 10;

    const STR_RANDOM = 10;
    const KAVENEGAR_SMS_PROVIDER = 'kavenegar';

    const TOKEN = 'token';

    const ALL_SLUGS = [
        self::DEFAULT_USER,
        self::LIMIT,
        self::TOKEN,
        self::STR_RANDOM,
    ];
}
