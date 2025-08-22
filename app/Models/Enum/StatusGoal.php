<?php

namespace App\Models\Enum;

Enum StatusGoal: string{
    case NaoIniciada = 'NaoIniciada';
    case Sucesso = 'Sucesso';
    case SemSucesso = 'SemSucesso';
    case ParcialmenteAtingida = 'ParcialmenteAtingida';
}