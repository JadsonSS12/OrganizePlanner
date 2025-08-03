<?php

use Illuminate\Validation\Rules\Enum;

Enum LifeSpan{
    case MORNING;
    case AFTERNOON;
    case EVENING;
}