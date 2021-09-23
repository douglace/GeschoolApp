<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = "menu_id";
    protected $fillable = ["name", "slug", "icon"];
    
    public function menuItems(){
        return $this->hasMany(MenuItem::class, "menu_id");
    }
}
