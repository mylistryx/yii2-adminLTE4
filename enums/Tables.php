<?php

namespace app\enums;

use app\traits\EnumToArray;

enum Tables: string
{
    use EnumToArray;

    case Calculation = 'calculation';
    case CalculationGem = 'calculation_gem';
    case CalculationWork = 'calculation_work';
    case Client = 'client';
    case Currency = 'currency';
    case CurrencyRate = 'currency_rate';
    case Gem = 'gem';
    case GemRate = 'gem_rate';

    case Identity = 'identity';
    case Metal = 'metal';
    case MetalRate = 'metal_rate';
    case Work = 'work';
}