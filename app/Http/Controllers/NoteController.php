<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Cours;
use App\Inscription;
use App\Sequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function show(Request $request){
        try {
            $courss = Cours::where("session_id", $this->current_session_id($request))->where("annee_id", $this->current_annee_id($request))->get()->all();
            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();
            $sequences = Sequence::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.note.show", compact("courss", "classes", "sequences"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_form_add(Request $request){
        try {
            $classe_id = (int)$request->input("classe_id");
            $sequence_id = (int)$request->input("sequence_id");

            $courss = Cours::where("session_id", $this->current_session_id($request))->where("annee_id", $this->current_annee_id($request))
            ->where("classe_id", $classe_id)->get()->all();

            $inscriptions_id = Inscription::select("eleve_id")->where();

            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.note.show", compact("courss", "classes", "sequences"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $cours_id){

        DB::beginTransaction();
        try {
            $cours = cours::find($cours_id);
            $isDelete = $cours->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $cours_id, int $new_etat){

        DB::beginTransaction();
        try {

            $cours = cours::find($cours_id);
            $cours->etat = $new_etat;
            $cours->update();
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
            $cours = $request->input();
            $cours["matiere_id"] = (int)$cours["matiere_id"];
            $cours["classe_id"] = (int)$cours["classe_id"];
            $cours["enseignant_id"] = (int)$cours["enseignant_id"];
            $cours["coeficient"] = (int)$cours["coeficient"];
            $cours["session_id"] = $this->current_session_id($request);
            $cours["annee_id"] = $this->current_annee_id($request);
            Cours::create($cours);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $cours_id){
        try {
            $cours = cours::find((int)$cours_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.cours.edit_form", compact("cours"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $cours = cours::find((int)$request->input("cours_id"));
            $cours->coeficient = (int)$request->input("coeficient");
            $cours->matiere_id = (int)$request->input("matiere_id");
            $cours->classe_id = (int)$request->input("classe_id");
            $cours->enseignant_id = (int)$request->input("enseignant_id");
            $cours->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
