<?php

namespace Selfofficename\Modules\Domain\Transaction\Enums;

use InvalidArgumentException;

/**
 * Enum representing user levels.
 */
enum StatusEnum: int
{
    case SUCCESS = 1;
    case CANCEL = 2;
    case PENDING = 3;
    case RETRIEVE = 4;

    public static function make($name): int
	{
		return self::{$name}();
	}

    /**
     * @param $value
     * @return string
     */
    public static function getString($value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower($case->name);
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }


    /**
     * @param $value
     * @return string
     */
    public static function getName($value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower(str_replace('_', ' ', $case->name));
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }

    /**
     * @return array
     */
    public static function getKeyValues(): array
    {
        $keyValues = [];
        foreach (self::cases() as $case) {
            $keyValues[$case->value] = strtolower(str_replace('_', ' ', $case->name));
        }
        return $keyValues;
    }
}

