<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Enseignant;
use App\Jour;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:enseignant-profil', ['only' => ['profil']]);
    }

    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function show(Request $request){
        try {
            $enseignants = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->enseignants : array(new Enseignant());

            return ges_ajax_response(1, "", [
                "view" => view("inc.enseignants.show", compact("enseignants"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $enseignant_id){

        DB::beginTransaction();
        try {
            $enseignant = enseignant::find($enseignant_id);
            $isDelete = $enseignant->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $enseignant_id, int $new_etat){

        DB::beginTransaction();
        try {

            $enseignant = enseignant::find($enseignant_id);
            $enseignant->etat = $new_etat;
            $enseignant->update();
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

            $inscription = $request->input();
            $inscription["session_id"] = $this->current_session_id($request);
            enseignant::create($inscription);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $enseignant_id){
        try {
            $enseignant = enseignant::find((int)$enseignant_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.enseignants.edit_form", compact("enseignant"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {

            $enseignant = enseignant::find((int)$request->input("enseignant_id"));
            $enseignant->nom = $request->input("nom");
            $enseignant->prenom = $request->input("prenom");
            $enseignant->date = $request->input("date");
            $enseignant->lieu = $request->input("lieu");
            $enseignant->tel = $request->input("tel");
            $enseignant->email = $request->input("email");
            $enseignant->sexe = $request->input("sexe");
            $enseignant->nationalite = $request->input("nationalite");
            $enseignant->adresse = $request->input("adresse");
            $enseignant->diplome = $request->input("diplome");
            $enseignant->update();

            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function profil(Request $request, int $enseignant_id){
        try {
            $enseignant = enseignant::find((int)$enseignant_id);
            $slug = "enseignants_view";

            return view("inc.enseignants.profil", compact("enseignant", "slug"));
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function profil_infos(Request $request, int $enseignant_id){
        try {
            $enseignant = enseignant::find((int)$enseignant_id);
            $cours = Cours::where('enseignant_id', $enseignant_id)->get()->all();
            $jours = Jour::where('session_id', $this->current_session_id($request))->get()->all();
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(true, "", [
                'view' => view("inc.enseignants.show_infos_view", compact("enseignant", "cours", "jours", "annee_id"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }
}
