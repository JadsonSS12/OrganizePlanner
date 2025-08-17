<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activit extends Model
{
    protected $fillable = [
        'descricao', 'status', 'data', 'category_id'
    ];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
