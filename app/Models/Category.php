<?php

namespace App\Models;
use DateTime;
use StatusGoal;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private DateTime $prazo;
    private StatusGoal $statusGoal;

    public function Tasks(){
        return $this->hasMany(Task::class);
    }

    public function getPrazo(){
        return $this->prazo;
    }
    public function setPrazo(DateTime $dateTime){
        $this->prazo = $dateTime;
    }

    public function getStatusGoal(StatusGoal $status){
       return $this->statusGoal;
    }
    public function setStatusGoal(StatusGoal $statusGoal){
        $this->statusGoal = $statusGoal;
    }


}
