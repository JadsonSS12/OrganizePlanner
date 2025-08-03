<?php

use Illuminate\Validation\Rules\Enum;

Enum StatusTask{
    case NaoIniciada;
    case Executada;
    case ParcialmenteExecutada;
    case adiada;
}