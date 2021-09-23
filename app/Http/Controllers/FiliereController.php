<?php

namespace App\Http\Controllers;

use App\Filiere;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiliereController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $filieres = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->filieres : array(new Filiere());
            
            return ges_ajax_response(1, "", [
                "view" => view("inc.filiere.show", compact("filieres"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $filiere_id){

        DB::beginTransaction();
        try {
            $filiere = Filiere::find($filiere_id);
            $isDelete = $filiere->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $filiere_id, int $new_etat){

        DB::beginTransaction();
        try {

            $filiere = Filiere::find($filiere_id);
            $filiere->etat = $new_etat;
            $filiere->update();
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
            $filiere = $request->input();
            $filiere["session_id"] = $this->current_session_id($request);
            Filiere::create($filiere);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $filiere_id){
        try {
            $filiere = Filiere::find((int)$filiere_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.filiere.edit_form", compact("filiere"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $filiere = Filiere::find((int)$request->input("filiere_id"));
            $filiere->intitule = $request->input("intitule");
            $filiere->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
