<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\BulletinSequence;
use App\BulletinTrimestre;
use App\Classe;
use App\Eleve;
use App\Inscription;
use App\Paiement;
use App\ParentEleve;
use App\Sequence;
use App\Session;
use App\Tranche;
use App\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:eleve-profil', ['only' => ['profil']]);
    }

    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function show(Request $request){
        try {
            $eleves = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->eleves : array(new Eleve());
            $classes = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->classes : array(new Classe());
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(1, "", [
                "view" => view("inc.eleves.show", compact("eleves", "classes", "annee_id"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function showClasse(Request $request, int $classe_id){
        try {
            $eleves = Inscription::getAllEleve($this->current_annee_id($request), $classe_id) ?? array(new Eleve());
            $classes = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->classes : array(new Classe());
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(1, "", [
                "view" => view("inc.eleves.show", compact("eleves", "classes", "annee_id"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $eleve_id){

        DB::beginTransaction();
        try {
            $eleve = eleve::find($eleve_id);
            $isDelete = $eleve->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $eleve_id, int $new_etat){

        DB::beginTransaction();
        try {

            $eleve = eleve::find($eleve_id);
            $eleve->etat = $new_etat;
            $eleve->update();
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

            $inscription["email_parent"] == null ? "-" : $inscription["email_parent"];
            $inscription["maladie"] == null ? "-" : $inscription["maladie"];
            $inscription["tel"] == null ? "0" : $inscription["tel"];
            $inscription["email"] == null ? "-" : $inscription["email"];
            $parent = ParentEleve::create($inscription);

            $inscription["annee_id"] = $this->current_annee_id($request);
            $inscription["parent_id"] = (int)$parent->parent_id;
            $inscription["session_id"] = $this->current_session_id($request);

            $eleve = eleve::create($inscription);
            $inscription["eleve_id"] = (int)$eleve->eleve_id;

            $inscript = Inscription::create($inscription);
            $paiement = Paiement::create($inscription);
            $classe = Classe::find($inscript->classe_id);
            $paiement->montant = $classe->montant;
            $paiement->reste = $classe->montant;
            $paiement->update();

            Bulletin::create($inscription);

            foreach(Sequence::all() as $sequence){
                $inscription["sequence_id"] = $sequence->sequence_id;
                BulletinSequence::create($inscription);
            }
            foreach(Trimestre::all() as $trimestre){
                $inscription["trimestre_id"] = $trimestre->trimestre_id;
                BulletinTrimestre::create($inscription);
            }

            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $eleve_id){
        try {
            $eleve = eleve::find((int)$eleve_id);
            $classes = Session::find($this->current_session_id($request))->classes;
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(true, "", [
                "view" => view("inc.eleves.edit_form", compact("eleve", "classes", "annee_id"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {

            $eleve = eleve::find((int)$request->input("eleve_id"));
            $eleve->nom = $request->input("nom");
            $eleve->prenom = $request->input("prenom");
            $eleve->date = $request->input("date");
            $eleve->lieu = $request->input("lieu");
            $eleve->tel = $request->input("tel");
            $eleve->email = $request->input("email");
            $eleve->sexe = $request->input("sexe");
            $eleve->nationalite = $request->input("nationalite");
            $eleve->adresse = $request->input("adresse");
            $eleve->statut = $request->input("statut");
            $eleve->maladie = $request->input("maladie");
            $eleve->handicap = $request->input("handicap");
            $eleve->parent->nom_parent = $request->input("nom_parent");
            $eleve->parent->profession = $request->input("profession");
            $eleve->parent->tel_parent = $request->input("tel_parent");
            $eleve->parent->adresse_parent = $request->input("adresse_parent");
            $eleve->parent->statut_parent = $request->input("statut_parent");
            $eleve->parent->email_parent = $request->input("email_parent");
            $eleve->parent->update();
            $eleve->update();

            $inscription = Inscription::where("eleve_id", $eleve->eleve_id)->where("annee_id", $this->current_annee_id($request))->first();

            if(is_null($inscription)){

                $new_inscription = array();
                $new_inscription["eleve_id"] = (int)$eleve->eleve_id;
                $new_inscription["classe_id"] = (int)$request->input("classe_id");
                $new_inscription["annee_id"] = $this->current_annee_id($request);
                $inscript = Inscription::create($new_inscription);
                $paiement = Paiement::create($new_inscription);
                $classe = Classe::find($inscript->classe_id);
                $paiement->montant = $classe->montant;
                $paiement->reste = $classe->montant;
                $paiement->update();

                Bulletin::create($new_inscription);

                foreach(Sequence::all() as $sequence){
                    $new_inscription["sequence_id"] = $sequence->sequence_id;
                    BulletinSequence::create($new_inscription);
                }
                foreach(Trimestre::all() as $trimestre){
                    $new_inscription["trimestre_id"] = $trimestre->trimestre_id;
                    BulletinTrimestre::create($new_inscription);
                }

            }else{

                $inscription->classe_id = (int)$request->input("classe_id");
                $inscription->update();
                $paiement = Paiement::where('eleve_id', $eleve->eleve_id)->where('annee_id', $this->current_annee_id($request))->first();
                $classe = Classe::find($inscription->classe_id);
                $paiement->montant = $classe->montant;
                $paiement->reste = $paiement->montant - $paiement->montant_paye;
                $reste = $paiement->montant;
                foreach($paiement->tranches as $tranche){
                    $tranche->reste = $reste - $tranche->montant;
                    $reste -= $tranche->montant;
                    $tranche->update();
                }
                $paiement->update();

                $bulletins = Bulletin::where("eleve_id", $eleve->eleve_id)->where("annee_id", $this->current_annee_id($request))->get()->all();
                foreach ($bulletins as $bulletin) {
                    $bulletin->classe_id = $classe->classe_id;
                    $bulletin->update();
                }
                $bulletinsTrim = BulletinTrimestre::where("eleve_id", $eleve->eleve_id)->where("annee_id", $this->current_annee_id($request))->get()->all();
                foreach ($bulletinsTrim as $bulletin) {
                    $bulletin->classe_id = $classe->classe_id;
                    $bulletin->update();
                }
                $bulletinsSeq = BulletinSequence::where("eleve_id", $eleve->eleve_id)->where("annee_id", $this->current_annee_id($request))->get()->all();
                foreach ($bulletinsSeq as $bulletin) {
                    $bulletin->classe_id = $classe->classe_id;
                    $bulletin->update();
                }
            }

            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function profil(Request $request, int $eleve_id){
        try {
            $eleve = eleve::find((int)$eleve_id);
            $annee_id = $this->current_annee_id($request);
            $slug = "eleves_view";

            return view("inc.eleves.profil", compact("eleve", "annee_id", "slug"));
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function profil_infos(Request $request, int $eleve_id){
        try {
            $eleve = eleve::find((int)$eleve_id);
            $annee_id = $this->current_annee_id($request);
            $slug = "eleves_view";

            return ges_ajax_response(true, '', [
                'view' => view("inc.eleves.show_infos_view", compact("eleve", "annee_id", "slug"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function paiement(Request $request, int $eleve_id){
        try {
            $paiement = Paiement::where("eleve_id", (int)$eleve_id)->where("annee_id", $this->current_annee_id($request))->first();

            return ges_ajax_response(true, "", [
                "view" => view("inc.eleves.paiement_show", compact("paiement"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function paiementAdd(Request $request){
        DB::beginTransaction();

        try{
            $tranche = $request->input();
            $tranche["paiement_id"] = (int)$tranche["paiement_id"];
            $paiement = Paiement::find($tranche["paiement_id"]);
            $tranche["montant"] = (int)$tranche["montant"];
            $paiement->reste = $paiement->reste - $tranche["montant"];
            $paiement->montant_paye = $paiement->montant - $paiement->reste;
            $paiement->update();
            $tranche["reste"] = $paiement->reste;

            $tranche = Tranche::create($tranche);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function paiementDel(int $tranche_id){

        DB::beginTransaction();
        try {
            $tranche = Tranche::find($tranche_id);
            $paiement = Paiement::find($tranche->paiement_id);
            $paiement->reste += $tranche->montant;
            $paiement->montant_paye = $paiement->montant - $paiement->reste;
            $paiement->update();
            $isDelete = $tranche->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
