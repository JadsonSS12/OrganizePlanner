<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enum\StatusGoal;

class Goal extends Model
{
    protected $table = 'goals';

    protected $fillable = [
        'description',
        'period',     
        'status',      
        'category_id'
    ];

    protected $casts = [
        'status' => StatusGoal::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    private string $description;
    private string $period;
    private ?StatusGoal $statusGoal = null;

    public function getDescription(): string
    {
        return $this->attributes['description'] ?? $this->description ?? '';
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
        $this->description = $description;
    }

    public function getPeriod(): string
    {
        return $this->attributes['period'] ?? $this->period ?? 'week';
    }

    public function setPeriod(string $period): void
    {
        if (!in_array($period, ['week','month','year'], true)) {
            throw new \InvalidArgumentException('Período inválido');
        }
        $this->attributes['period'] = $period;
        $this->period = $period;
    }

    public function getStatusGoal(): ?StatusGoal
    {
        return $this->getAttribute('status'); 
    }

    public function setStatusGoal(?StatusGoal $statusGoal): void
    {
        $this->attributes['status'] = $statusGoal?->value; 
        $this->statusGoal = $statusGoal;
    }
}