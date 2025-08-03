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

    public DateTime $day;
    public StatusGoal $status;
    public LifeSpan $begin;
    public LifeSpan $end;
    public ArrayList $turnos;
    public DurationBloc $durationbloc;


    

}
