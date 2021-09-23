<?php

namespace App\Http\Controllers;

use App\Trimestre;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrimestreController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $trimestres =  Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->trimestres : array(new Trimestre);

            return ges_ajax_response(1, "", [
                "view" => view("inc.trimestre.show", compact("trimestres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $trimestre_id){

        DB::beginTransaction();
        try {
            $trimestre = Trimestre::find($trimestre_id);
            $isDelete = $trimestre->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $trimestre_id, int $new_etat){

        DB::beginTransaction();
        try {

            $trimestre = Trimestre::find($trimestre_id);
            $trimestre->etat = $new_etat;
            $trimestre->update();
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
            $trimestre = $request->input();
            $trimestre["session_id"] = $this->current_session_id($request);
            $trimestre["numero"] = (int)$trimestre["numero"];
            Trimestre::create($trimestre);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $trimestre_id){
        try {
            $trimestre = Trimestre::find((int)$trimestre_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.trimestre.edit_form", compact("trimestre"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $trimestre = Trimestre::find((int)$request->input("trimestre_id"));
            $trimestre->intitule = $request->input("intitule");
            $trimestre->numero = (int)$request->input("numero");
            $trimestre->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
