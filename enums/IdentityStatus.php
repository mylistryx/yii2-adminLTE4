<?php

namespace app\enums;

use app\traits\EnumToArray;

enum IdentityStatus: int
{
    use EnumToArray;

    case Active = 100;
    case Inactive = 0;

    public static function defaultValue(?self $forcedValue = null): self
    {
        return $forcedValue ?? self::Inactive;
    }
}