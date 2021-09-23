<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $primaryKey = "menu_item_id";
    protected $fillable = ["name", "slug", "menu_id"];
    
    public function menu(){
        return $this->belongsTo(Menu::class, "menu_id");
    }
}
