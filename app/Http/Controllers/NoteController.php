<?php

namespace App\Http\Controllers;

use App\BulletinSequence;
use App\Classe;
use App\Cours;
use App\Inscription;
use App\Note;
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
            $cours_id = (int)$request->input("cours_id");
            $cours = Cours::find($cours_id);
            $sequence = Sequence::find($sequence_id);
            $eleves = Inscription::getAllEleve($this->current_annee_id($request), $classe_id);

            $notes = Note::where("cours_id", $cours_id)->where("sequence_id", $sequence_id)->get()->all();

            if (empty($notes)) {

                return ges_ajax_response(1, "", [
                    "view" => view("inc.note.form_add", compact("cours", "eleves", "sequence"))->render()
                ]);
            }

            return ges_ajax_response(1, "", [
                "view" => view("inc.note.edit_form", compact("cours", "notes", "sequence"))->render()
            ]);
            

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_select_cours(Request $request){
        try {
            $classe_id = (int)$request->input("classe_id");

            $courss = Cours::where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.note.select_cours", compact("courss"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function creat(Request $request){
        DB::beginTransaction();

        try{
            $sequence_id = (int)$request->input("sequence_id");
            $cours_id = (int)$request->input("cours_id");
            $new_notes = $request->input();
            
            $cours = Cours::find($cours_id);
            $eleves = Inscription::getAllEleve($this->current_annee_id($request), $cours->classe->classe_id);
            foreach($eleves as $eleve){
                $bulletinSequence = BulletinSequence::where("annee_id", $this->current_annee_id($request))
                ->where("sequence_id", $sequence_id)
                ->where("eleve_id", $eleve->eleve_id)->first();

                $old_note = Note::where("cours_id", $cours_id)->where("sequence_id", $sequence_id)->where("eleve_id", $eleve->eleve_id)->get()->first();
                if(is_null($old_note)){
                    $note = new Note();
                    $note->sequence_id = $sequence_id;
                    $note->eleve_id = $eleve->eleve_id;
                    $note->cours_id = $cours_id;
                    $note->bulletin_sequence_id = $bulletinSequence->bulletin_sequence_id;
                    if(is_null($new_notes[$eleve->eleve_id])){
                        $note->note = 0.1;
                    }else{
                        $note->note = (float)$new_notes[$eleve->eleve_id];
                    }
                    $note->save();
                }else{
                    if(is_null($new_notes["$eleve->eleve_id"])){
                        $old_note->note = 0.1;
                    }else{
                        $old_note->note = (float)$new_notes[$eleve->eleve_id];
                    }
                    $old_note->update();
                }
            }

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
}
