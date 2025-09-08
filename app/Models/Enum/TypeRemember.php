<?php

namespace App\Models\Enum;

use Illuminate\Validation\Rules\Enum;

Enum TypeRemember: string{
     case Reunioes = 'Reuniões';
    case LigacoesImportantes = 'Ligações Importantes';
    case Compras = 'Compras';
    case Anotacoes = 'Anotações';
}