<?php

namespace App\Models;
use DateTime;
use StatusGoal;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public DateTime $Prazo;
    public StatusGoal $StatusMeta;

    public function Tasks(){
        return $this->hasMany(Task::class);
    }
}
