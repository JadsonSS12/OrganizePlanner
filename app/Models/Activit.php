<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activit extends Model
{
    private float $id;
    private String $title;

    function __contruct(float $id, String $title){
        $this->id = $id;
        $this->title = $title;
    }

    public function setId(float $id){
        $this->id = $id;
    }

    public function setTitle(String $title){
        $this->title = $title;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }
}
