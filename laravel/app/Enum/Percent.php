<?php

namespace App\Enum;

enum Percent: string
{
    case MAX = '0.7';
    case MIDDLE = '0.5';
    case SMALL = '0.3';
    case MIN = '0.1';
}
