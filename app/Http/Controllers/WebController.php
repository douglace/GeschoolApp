<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Eleve;
use App\Enseignant;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home () {
        $nb_eleves = Eleve::all()->count();
        $nb_enseignants = Enseignant::all()->count();
        $nb_classes = Classe::all()->count();
        return view('home', compact("nb_eleves", "nb_enseignants", "nb_classes"));
    }
}
