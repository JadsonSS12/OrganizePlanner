<?php

use Illuminate\Validation\Rules\Enum;

Enum StatusGoal{
    case NaoIniciada;
    case Sucesso;
    case SemSucesso;
    case ParcialmenteAtingida;
}