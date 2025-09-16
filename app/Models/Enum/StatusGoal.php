<?php

namespace App\Models\Enum;

Enum StatusGoal: string{
    case NaoIniciada = 'NaoIniciada';
    case Sucesso = 'Sucesso';
    case SemSucesso = 'SemSucesso';
    case ParcialmenteAtingida = 'ParcialmenteAtingida';

    public function color(): string
    {
        return match ($this) {
            self::NaoIniciada => '#6c757d',          // Cinza (secondary)
            self::Sucesso => '#198754',              // Verde (success)
            self::SemSucesso => '#dc3545',           // Vermelho (danger)
            self::ParcialmenteAtingida => '#ffc107', // Amarelo (warning)
        };
    }

}