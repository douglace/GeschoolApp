<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
    protected $primaryKey = "parent_id";
    protected $fillable = ["nom_parent", "profession", "tel_parent", "adresse_parent", "statut_parent", "email_parent"];
    protected $table = "parents";
    
}
