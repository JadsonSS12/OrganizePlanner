<?php

namespace App\Models;

use DateTime;
use DurationBloc;
use LifeSpan;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\ArrayList;
use StatusGoal;

class Task extends Activit
{
   
    private String $description;
    
    public function categories(){
        return $this->belongsTo(Category::class);
    }

     public function __construct(string $description, DateTime $day, StatusGoal $status, LifeSpan $begin, LifeSpan $end, ArrayList $turnos, DurationBloc $durationbloc) {
        $this->description = $description;
        $this->day = $day;
        $this->status = $status;
        $this->begin = $begin;
        $this->end = $end;
        $this->turnos = $turnos;
        $this->durationbloc = $durationbloc;
    }

    private DateTime $day;
    private StatusGoal $status;
    private LifeSpan $begin;
    private LifeSpan $end;
    private ArrayList $turnos;
    private DurationBloc $durationbloc;

   public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDay(): DateTime {
        return $this->day;
    }

    public function setDay(DateTime $day): void {
        $this->day = $day;
    }

    public function getStatus(): StatusGoal {
        return $this->status;
    }

    public function setStatus(StatusGoal $status): void {
        $this->status = $status;
    }

    public function getBegin(): LifeSpan {
        return $this->begin;
    }

    public function setBegin(LifeSpan $begin): void {
        $this->begin = $begin;
    }

    public function getEnd(): LifeSpan {
        return $this->end;
    }

    public function setEnd(LifeSpan $end): void {
        $this->end = $end;
    }

    public function getTurnos(): ArrayList {
        return $this->turnos;
    }

    public function setTurnos(ArrayList $turnos): void {
        $this->turnos = $turnos;
    }

    public function getDurationbloc(): DurationBloc {
        return $this->durationbloc;
    }

    public function setDurationbloc(DurationBloc $durationbloc): void {
        $this->durationbloc = $durationbloc;
    }
    

}
