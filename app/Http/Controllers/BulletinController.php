<?php

namespace App\Http\Controllers;

use App\BulletinSequence;
use App\BulletinTrimestre;
use App\Classe;
use App\NoteTrimestre;
use App\Sequence;
use App\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BulletinController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function index_sequence(Request $request){
        try {
            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();
            $sequences = Sequence::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.bulletin_sequence.show", compact("classes", "sequences"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_sequence(Request $request){
        try {
            $classe_id = (int)$request->input("classe_id");
            $sequence_id = (int)$request->input("sequence_id");

            $classe = Classe::find($classe_id);
            $sequence = Sequence::find($sequence_id);

            $bulletins = BulletinSequence::where("sequence_id", $sequence_id)->where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();
            foreach ($bulletins as $bulletin) {
                $note_total = 0;
                $coef_total = 0;
                foreach ($bulletin->notes as $note) {
                    if ($note->note != 0.1) {
                        $note_total += $note->note * $note->cours->coeficient;
                        $coef_total += $note->cours->coeficient;
                    }
                }
                if ($coef_total != 0) {
                    $bulletin->moyenne = $note_total / $coef_total;
                }
                $bulletin->update();
            }

            $bulletins = BulletinSequence::where("sequence_id", $sequence_id)->where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            return view("inc.bulletin_sequence.bulletinSequence", compact("bulletins", "classe", "sequence"));

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function index_trimestre(Request $request){
        try {
            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();
            $trimestres = Trimestre::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.bulletin_trimestre.show", compact("classes", "trimestres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_trimestre(Request $request){
        DB::beginTransaction();
        try {
            $classe_id = (int)$request->input("classe_id");
            $trimestre_id = (int)$request->input("trimestre_id");

            $classe = Classe::find($classe_id);
            $trimestre = Trimestre::find($trimestre_id);

            $bulletins = BulletinTrimestre::where("trimestre_id", $trimestre_id)->where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            foreach ($bulletins as $bulletin) {

                foreach ($classe->getAllCoursWithAnnee($bulletin->annee_id) as $cours) {
                    $note_trim = 0;
                    $nbr_seq = 0;
                    foreach ($bulletin->trimestre->sequences as $sequence) {
                        $note_seq = $bulletin->eleve->getNoteSequence($sequence->sequence_id, $cours->cours_id)->note;
                        if ($note_seq != 0.1) {
                            $note_trim += $note_seq;
                            $nbr_seq++;
                        }
                    }

                    $note_trimestre = NoteTrimestre::where("trimestre_id", $trimestre_id)->where("eleve_id", $bulletin->eleve_id)->where("cours_id", $cours->cours_id)->first();

                    if (is_null($note_trimestre)) {
                        $note_trimestre = new NoteTrimestre();
                        $note_trimestre->trimestre_id = $bulletin->trimestre_id;
                        $note_trimestre->cours_id = $cours->cours_id;
                        $note_trimestre->eleve_id = $bulletin->eleve_id;
                        $note_trimestre->bulletin_trimestre_id = $bulletin->bulletin_trimestre_id;
                    }

                    if ($nbr_seq == 0) {
                        $note_trimestre->note = 0.1;
                    }else {
                        $note_trimestre->note = $note_trim / $nbr_seq;
                    }
                    $note_trimestre->save();
                }
            }

            $bulletins = BulletinTrimestre::where("trimestre_id", $trimestre_id)->where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            foreach ($bulletins as $bulletin) {
                $note_total = 0;
                $coef_total = 0;
                foreach ($bulletin->notes as $note) {
                    if ($note->note != 0.1) {
                        $note_total += $note->note * $note->cours->coeficient;
                        $coef_total += $note->cours->coeficient;
                    }
                }
                if ($coef_total != 0) {
                    $bulletin->moyenne = $note_total / $coef_total;
                }
                $bulletin->update();
            }

            DB::commit();

            $bulletins = BulletinTrimestre::where("trimestre_id", $trimestre_id)->where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            return view("inc.bulletin_trimestre.bulletinTrimestre", compact("bulletins", "classe", "trimestre"));

        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

}
