<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('permission:eleve-profil', ['only' => ['profil']]);
    }*/

    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }
}
