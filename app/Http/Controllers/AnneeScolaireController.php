<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnneeScolaire;
use Illuminate\Support\Facades\DB;

class AnneeScolaireController extends Controller
{
    
    public function show(){
        try {

            $annees = AnneeScolaire::all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.annee_scolaire.show", compact("annees"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $annee_id){

        DB::beginTransaction();
        try {
            $anne = AnneeScolaire::find($annee_id);
            $isDelete = $anne->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $annee_id, int $new_etat){

        DB::beginTransaction();
        try {

            $annee = AnneeScolaire::find($annee_id);
            $annee->etat = $new_etat;
            $annee->update();
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
            $annee = new AnneeScolaire();
            $annee->debut = (int)$request->input("debut");
            $annee->fin = (int)$request->input("fin");
            $annee->save();
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $annee_id){
        try {
            $annee = AnneeScolaire::find($annee_id);
            return ges_ajax_response(true, "", [
                "view" => view("inc.annee_scolaire.edit_form", compact("annee"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $annee = AnneeScolaire::find((int)$request->input("annee_id"));
            $annee->debut = (int)$request->input("debut");
            $annee->fin = (int)$request->input("fin");
            $annee->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
