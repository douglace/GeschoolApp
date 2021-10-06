<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeMatiere extends Model
{
    protected $primaryKey = "groupe_matiere_id";
    protected $fillable = ["intitule", "session_id"];

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function classes(){
        return $this->hasMany(Classe::class, "groupe_matiere_id");
    }
}
