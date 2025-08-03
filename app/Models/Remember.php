<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use TypeRemember;

class Remember extends Model{
    private float $id;
    private String $title;
    private String $description;
    public TypeRemember $typeRemember;
    private bool $semanal;
    private DateTime $dateTime;

    public function getId(){
        return $this->id;
    }

    public function setId(float $id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle(String $title){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription(String $description){
        $this->description = $description;
    }

    public function getTypeRemember(){
        return $this->typeRemember;
    }

    public function setTypeRemember(TypeRemember $typeRemember){
        $this->typeRemember = $typeRemember;
    }

    public function getSemanal(){
        return $this->semanal;
    }

    public function getDateTime(){
        return $this->dateTime;
    }

    public function setDateTime(DateTime $dateTime){
        $this->dateTime = $dateTime;
    }

    public function setSemanal(bool $semanal){
        $this->semanal = $semanal;
    }

    public function __construct(float $id, String $title, String $description = "", bool $semanal, TypeRemember $typeRemember){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->semanal = $semanal;
        $this->typeRemember = $typeRemember;
        $this->dateTime = new DateTime();
    }

   public function Semanal(){
    if($this->getSemanal()){
        $this->setDateTime($this->dateTime->modify("P7D"));
    }
   }
}