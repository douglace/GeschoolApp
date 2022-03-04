<?php

namespace App\Http\Controllers;

use App\Classe;
use App\cycle;
use App\Inscription;
use App\Session;
use App\Enseignant;
use App\Jour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasseController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function show(Request $request){
        try {
            $classes = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->classes : array(new Classe());
            $cycles = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->cycles : array(new cycle());
            $enseignants = Enseignant::where('session_id', $this->current_session_id($request))->get()->all() ?? array(new Enseignant());
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(1, "", [
                "view" => view("inc.classe.show", compact("classes", "cycles", "enseignants", "annee_id"))->render()
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
            $classe["montant"] = (int)$classe["montant"];
            $classe["cycle_id"] = (int)$classe["cycle_id"];
            $classe["enseignant_id"] = (int)$classe["enseignant_id"];
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
            $cycles = Session::find($this->current_session_id($request))->cycles;
            $enseignants = Enseignant::where('session_id', $this->current_session_id($request))->get()->all() ?? array(new Enseignant());

            return ges_ajax_response(true, "", [
                "view" => view("inc.classe.edit_form", compact("classe", "cycles", "enseignants"))->render()
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
            $classe->montant = (int)$request->input("montant");
            $classe->cycle_id = (int)$request->input("cycle_id");
            $classe->enseignant_id = (int)$request->input("enseignant_id");
            $classe->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function profil(Request $request, int $classe_id){
        try {
            $classes = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->classes : array(new Classe());
            $annee_id = $this->current_annee_id($request);
            $slug = "classe_view";
            $classe = Classe::find($classe_id);

            return view("inc.classe.profil", compact("classes", "annee_id", "slug", "classe"));
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function profil_infos(Request $request, int $classe_id){
        try {
            $annee_id = $this->current_annee_id($request);
            $slug = "classe_view";
            $classe = Classe::find($classe_id);
            $eleves = Inscription::getAllEleve($annee_id, $classe_id);
            $jours = Jour::where('session_id', $this->current_session_id($request))->get()->all();

            return ges_ajax_response(true, '', [
                'view' => view("inc.classe.show_infos_view", compact("annee_id", "slug", "classe", "eleves", "jours"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }
}
