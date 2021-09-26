<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    protected $primaryKey = "trimestre_id";
    protected $fillable = ["intitule", "numero", "session_id"];

    public function sequences(){
        return $this->hasMany(Sequence::class, "trimestre_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id", "session_id");
    }
}
