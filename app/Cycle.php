<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $primaryKey = "cycle_id";
    protected $fillable = ["intitule", "session_id"];

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function classes(){
        return $this->hasMany(Classe::class, "cycle_id");
    }
}
