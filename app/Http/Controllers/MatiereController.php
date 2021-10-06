<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\Session;
use App\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereController extends Controller
{
    
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $matieres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->matieres : array(new Matiere());
            $groupe_matieres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->groupe_matieres : array(new GroupeMatiere());
            $enseignants = Enseignant::where('session_id', $this->current_session_id($request))->get()->all() ?? array(new Enseignant());

            return ges_ajax_response(1, "", [
                "view" => view("inc.matiere.show", compact("matieres", "groupe_matieres", "enseignants"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $matiere_id){

        DB::beginTransaction();
        try {
            $matiere = matiere::find($matiere_id);
            $isDelete = $matiere->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $matiere_id, int $new_etat){

        DB::beginTransaction();
        try {

            $matiere = matiere::find($matiere_id);
            $matiere->etat = $new_etat;
            $matiere->update();
            DB::commit();

            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function creat(Request $request){
        DB::beginTransaction();

        try{
            $matiere = $request->input();
            $matiere["groupe_matiere_id"] = (int)$matiere["groupe_matiere_id"];
            $matiere["session_id"] = $this->current_session_id($request);
            $matiere["enseignant_id"] = (int)$matiere["enseignant_id"] ?? 0;
            matiere::create($matiere);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $matiere_id){
        try {
            $matiere = matiere::find((int)$matiere_id);
            $groupe_matieres = Session::find($this->current_session_id($request))->groupe_matieres;
            $enseignants = Enseignant::where('session_id', $this->current_session_id($request))->get()->all() ?? array(new Enseignant());

            return ges_ajax_response(true, "", [
                "view" => view("inc.matiere.edit_form", compact("matiere", "groupe_matieres", "enseignants"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $matiere = matiere::find((int)$request->input("matiere_id"));
            $matiere->intitule = $request->input("intitule");
            $matiere->enseignant_id = (int)$request->input("enseignant_id") ?? 0;
            $matiere->groupe_matiere_id = (int)$request->input("groupe_matiere_id");
            $matiere->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
