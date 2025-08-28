<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enum\TypeRemember;


class Remember extends Model{
    
    protected $fillable = [
        'title',
        'description',
        'typeRemember',
        'semanal',
        'dateTime'
    ];

    
    protected $casts = [
        'semanal' => 'boolean',
        'dateTime' => 'datetime',
        'typeRemember' => TypeRemember::class
    ];


    public $timestamps = false;

    
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function setDescription(?string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getTypeRemember(): TypeRemember
    {
        return $this->attributes['typeRemember'];
    }

    public function setTypeRemember(TypeRemember $typeRemember): void
    {
        $this->attributes['typeRemember'] = $typeRemember;
    }

    public function getSemanal(): bool
    {
        return $this->attributes['semanal'];
    }

    public function setSemanal(bool $semanal): void
    {
        $this->attributes['semanal'] = $semanal;
    }

    public function getDateTime(): DateTime
    {
        return $this->attributes['dateTime'];
    }

    public function setDateTime(DateTime $dateTime): void
    {
        $this->attributes['dateTime'] = $dateTime;
    }

    
    public function semanalUpdate(): void
    {
        if ($this->getSemanal()) {
            $this->setDateTime($this->getDateTime()->modify("+7 days"));
        }
    }
}