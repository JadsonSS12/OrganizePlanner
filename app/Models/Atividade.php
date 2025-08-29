<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atividade extends Model
{

    public const STATUS_PENDENTE      = 'pendente';
    public const STATUS_EM_ANDAMENTO  = 'em_andamento';
    public const STATUS_CONCLUIDA     = 'concluida';
    public const STATUS_CANCELADA     = 'cancelada';

    protected $fillable = [
        'descricao', 'status', 'data', 'category_id', 'user_id', 'hora_inicio', 'hora_fim',
    ];

    public function categoria(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
