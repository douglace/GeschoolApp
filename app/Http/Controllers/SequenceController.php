<?php

namespace App\Http\Controllers;

use App\Sequence;
use App\Session;
use App\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SequenceController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $sequences = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->sequences : array(new Sequence());
            $trimestres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->trimestres : array(new Trimestre());

            return ges_ajax_response(1, "", [
                "view" => view("inc.sequence.show", compact("sequences", "trimestres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $sequence_id){

        DB::beginTransaction();
        try {
            $sequence = Sequence::find($sequence_id);
            $isDelete = $sequence->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $sequence_id, int $new_etat){

        DB::beginTransaction();
        try {

            $sequence = Sequence::find($sequence_id);
            $sequence->etat = $new_etat;
            $sequence->update();
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
            $sequence = $request->input();
            $sequence["numero"] = (int)$sequence["numero"];
            $sequence["trimestre_id"] = (int)$sequence["trimestre_id"];
            $sequence["session_id"] = $this->current_session_id($request);
            Sequence::create($sequence);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(Request $request, int $sequence_id){
        try {
            $sequence = Sequence::find((int)$sequence_id);
            $trimestres = Session::find($this->current_session_id($request))->trimestres;

            return ges_ajax_response(true, "", [
                "view" => view("inc.sequence.edit_form", compact("sequence", "trimestres"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $sequence = Sequence::find((int)$request->input("sequence_id"));
            $sequence->intitule = $request->input("intitule");
            $sequence->numero = (int)$request->input("numero");
            $sequence->trimestre_id = (int)$request->input("trimestre_id");
            $sequence->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
