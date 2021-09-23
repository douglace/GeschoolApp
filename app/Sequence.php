<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    protected $primaryKey = "sequence_id";
    protected $fillable = ["intitule", "numero", "trimestre_id", "session_id"];

    public function trimestre(){
        return $this->belongsTo(Trimestre::class,"trimestre_id", "trimestre_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id", "session_id");
    }
}
