<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Filiere;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasseController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $classes = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->classes : array(new Classe());
            $filieres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->filieres : array(new Filiere());

            return ges_ajax_response(1, "", [
                "view" => view("inc.classe.show", compact("classes", "filieres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $classe_id){

        DB::beginTransaction();
        try {
            $classe = Classe::find($classe_id);
            $isDelete = $classe->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $classe_id, int $new_etat){

        DB::beginTransaction();
        try {

            $classe = Classe::find($classe_id);
            $classe->etat = $new_etat;
            $classe->update();
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
            $classe = $request->input();
            $classe["niveau"] = (int)$classe["niveau"];
            $classe["montant"] = (int)$classe["montant"];
            $classe["filiere_id"] = (int)$classe["filiere_id"];
            $classe["session_id"] = $this->current_session_id($request);
            Classe::create($classe);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $classe_id){
        try {
            $classe = classe::find((int)$classe_id);
            $filieres = Session::find($this->current_session_id($request))->filieres;

            return ges_ajax_response(true, "", [
                "view" => view("inc.classe.edit_form", compact("classe", "filieres"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $classe = classe::find((int)$request->input("classe_id"));
            $classe->intitule = $request->input("intitule");
            $classe->niveau = (int)$request->input("niveau");
            $classe->montant = (int)$request->input("montant");
            $classe->filiere_id = (int)$request->input("filiere_id");
            $classe->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
