<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Cours;
use App\Emploi;
use App\Jour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmploiesController extends Controller
{
    //
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    private function current_annee_id(Request $request){
        return (int)$request->session()->get("annee_id");
    }

    public function show(Request $request){
        try {
            $classes = Classe::where("session_id", $this->current_session_id($request))->get()->all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.emploies.show", compact("classes"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function show_second(Request $request){
        try {
            $classe_id = (int) $request->input('classe_id');
            $classe = Classe::find($classe_id);
            $jours = Jour::where('session_id', $this->current_session_id($request))->get()->all();
            $courss = Cours::where("classe_id", $classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();
            $annee_id = $this->current_annee_id($request);

            return ges_ajax_response(1, "", [
                "view" => view("inc.emploies.show_second", compact("jours", "classe", "courss", "annee_id"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function creat (Request $request){
        DB::beginTransaction();
        try{
            $input = $request->input();
            $input['annee_id'] = $this->current_annee_id($request);
            $input['session_id'] = $this->current_session_id($request);

            $input = array_filter($input, function ($value){
                return $value != 'null';
            });

            $result = Emploi::create($input);

            DB::commit();

            if($result){
                return ges_ajax_response(true);
            } else{
                return ges_ajax_response(false);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit (Request $request, int $emploi_id){
        try {
            $emploi = Emploi::find($emploi_id);

            if(!isset($emploi) || empty($emploi) || is_null($emploi)){
                return ges_ajax_response(false);
            }

            $jours = Jour::where('session_id', $this->current_session_id($request))->get()->all();
            $courss = Cours::where("classe_id", $emploi->classe_id)->where("annee_id", $this->current_annee_id($request))->get()->all();

            return ges_ajax_response(true, '', [
                'view' => view('inc.emploies.edit_form', compact("emploi", "jours", "courss"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update (Request $request){
        try {
            $emploi_id = (int)$request->input('emploi_id');
            $cours_id = $request->input('cours_id') == 'null' ? false : (int)$request->input('cours_id');
            $jour_id = (int)$request->input('jour_id');
            $heur_db = $request->input('heur_db');
            $heur_fin = $request->input('heur_fin');

            $emploi = Emploi::find($emploi_id);

            if(!isset($emploi) || empty($emploi) || is_null($emploi)){
                return ges_ajax_response(false);
            }

            if($cours_id !== false){
                $emploi->cours_id = $cours_id;
            }

            $emploi->jour_id = $jour_id;
            $emploi->heur_db = $heur_db;
            $emploi->heur_fin = $heur_fin;

            $result = $emploi->update();

            if(!$result){
                return ges_ajax_response(false);
            }

            return ges_ajax_response(true);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function delete (Request $request, int $emploi_id){
        try {
            $emploi = Emploi::find($emploi_id);

            if(!isset($emploi) || empty($emploi) || is_null($emploi)){
                return ges_ajax_response(false);
            }

            $classe_id = $emploi->classe_id;

            $result = $emploi->delete();
            if(!$result){
                return ges_ajax_response(false);
            }

            return ges_ajax_response(true, '', [
                'classe_id' => $classe_id
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }
}
