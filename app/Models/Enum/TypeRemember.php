<?php

namespace App\Models\Enum;

use Illuminate\Validation\Rules\Enum;

Enum TypeRemember: string{
     case Reunioes = 'Reunioes';
    case LigacoesImportantes = 'LigacoesImportantes';
    case Compras = 'Compras';
    case Anotacoes = 'Anotacoes';
}