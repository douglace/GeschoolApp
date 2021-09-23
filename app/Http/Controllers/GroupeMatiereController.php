<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupeMatiereController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $groupe_matieres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->groupe_matieres : array(new GroupeMatiere());
            
            return ges_ajax_response(1, "", [
                "view" => view("inc.groupe_matiere.show", compact("groupe_matieres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $groupe_matiere_id){

        DB::beginTransaction();
        try {
            $groupe_matiere = groupematiere::find($groupe_matiere_id);
            $isDelete = $groupe_matiere->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $groupe_matiere_id, int $new_etat){

        DB::beginTransaction();
        try {

            $groupe_matiere = groupematiere::find($groupe_matiere_id);
            $groupe_matiere->etat = $new_etat;
            $groupe_matiere->update();
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
            $groupe_matiere = $request->input();
            $groupe_matiere["session_id"] = $this->current_session_id($request);
            groupematiere::create($groupe_matiere);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $groupe_matiere_id){
        try {
            $groupe_matiere = groupematiere::find((int)$groupe_matiere_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.groupe_matiere.edit_form", compact("groupe_matiere"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $groupe_matiere = groupematiere::find((int)$request->input("groupe_matiere_id"));
            $groupe_matiere->intitule = $request->input("intitule");
            $groupe_matiere->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
