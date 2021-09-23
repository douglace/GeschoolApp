<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function show(){
        try {

            $sessions = Session::all();

            return ges_ajax_response(1, "", [
                "view" => view("inc.session.show", compact("sessions"))->render()
            ]);

        } catch (\Exception $e) {
            
        }
    }

    public function del(int $session_id){

        DB::beginTransaction();
        try {
            $session = Session::find($session_id);
            $isDelete = $session->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $session_id, int $new_etat){

        DB::beginTransaction();
        try {

            $session = Session::find($session_id);
            $session->etat = $new_etat;
            $session->update();
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
            Session::create($request->input());
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $session_id){
        try {
            $session = Session::find((int)$session_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.session.edit_form", compact("session"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $session = Session::find((int)$request->input("session_id"));
            $session->intitule = $request->input("intitule");
            $session->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
