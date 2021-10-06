<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $primaryKey = "matiere_id";
    protected $guarded = ["etat"];

    public function groupe_matiere(){
        return $this->belongsTo(GroupeMatiere::class, "groupe_matiere_id");
    }

    public function responsable(){
        return $this->belongsTo(Enseignant::class, "enseignant_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }
}
