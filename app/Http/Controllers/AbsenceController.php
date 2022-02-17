<?php

namespace App\Http\Controllers;

use App\Absence;
use App\BulletinSequence;
use App\Classe;
use App\Cours;
use App\Inscription;
use App\Note;
use App\Sequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('permission:eleve-profil', ['only' => ['profil']]);
    }*/

    public function showSequence(Request $request){
        try {
            $courss = Cours::where("session_id", $this->current_session_id($request))->where("annee_id", $this->current_annee_id($request))->get()->all();
            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();
            $sequences = Sequence::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.absences.show_sequence", compact("courss", "classes", "sequences"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_form_add(Request $request){
        try {
            $annee_id = $this->current_annee_id($request);
            $session_id = $this->current_session_id($request);
            $classe_id = (int)$request->input("classe_id");
            $sequence_id = (int)$request->input("sequence_id");
            $classe = Classe::find($classe_id);
            $sequence = Sequence::find($sequence_id);
            $eleves = Inscription::getAllEleve($this->current_annee_id($request), $classe_id);

            $absences = Absence::where("classe_id", $classe_id)->where("sequence_id", $sequence_id)
                ->where('annee_id', $annee_id)->where('session_id', $session_id)->where('enseignant_id', null)
                ->get()->all();

            if (empty($absences)) {

                return ges_ajax_response(1, "", [
                    "view" => view("inc.absences.form_add", compact("eleves", "sequence", "classe"))->render()
                ]);
            }

            return ges_ajax_response(1, "", [
                "view" => view("inc.absences.edit_form", compact( "absences", "sequence", "classe"))->render()
            ]);


        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function creat(Request $request){
        DB::beginTransaction();

        try{
            $annee_id = $this->current_annee_id($request);
            $session_id = $this->current_session_id($request);
            $sequence_id = (int)$request->input("sequence_id");
            $classe_id = (int)$request->input("classe_id");
            $new_absences = $request->input();

            $classe = Classe::find($classe_id);
            $eleves = Inscription::getAllEleve($this->current_annee_id($request), $classe->classe_id);
            foreach($eleves as $eleve){

                $old_absence = Absence::where("classe_id", $classe_id)->where("sequence_id", $sequence_id)
                    ->where("eleve_id", $eleve->eleve_id)->where('annee_id', $annee_id)->where('session_id', $session_id)
                    ->get()->first();

                if(is_null($old_absence)){
                    $absence = new Absence();
                    $absence->sequence_id = $sequence_id;
                    $absence->eleve_id = $eleve->eleve_id;
                    $absence->session_id = $session_id;
                    $absence->annee_id = $annee_id;
                    $absence->classe_id = $classe_id;

                    if(is_null($new_absences[$eleve->eleve_id])){
                        $absence->nb_heure = 0;
                    }else{
                        $absence->nb_heure = (int)$new_absences[$eleve->eleve_id];
                    }
                    $absence->save();
                }else{
                    if(is_null($new_absences["$eleve->eleve_id"])){
                        $old_absence->nb_heure = 0;
                    }else{
                        $old_absence->nb_heure = (int)$new_absences[$eleve->eleve_id];
                    }
                    $old_absence->update();
                }
            }

            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
