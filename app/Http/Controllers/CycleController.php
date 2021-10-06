<?php

namespace App\Http\Controllers;

use App\cycle;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cycleController extends Controller
{
    private function current_session_id(Request $request){
        return (int)$request->session()->get("session_id");
    }

    public function show(Request $request){
        try {
            $cycles = Session::find($this->current_session_id($request)) ? Session::find($this->current_session_id($request))->cycles : array(new cycle());
            
            return ges_ajax_response(1, "", [
                "view" => view("inc.cycle.show", compact("cycles"))->render()
            ]);

        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function del(int $cycle_id){

        DB::beginTransaction();
        try {
            $cycle = cycle::find($cycle_id);
            $isDelete = $cycle->delete();
            DB::commit();

            return ges_ajax_response($isDelete);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function status(int $cycle_id, int $new_etat){

        DB::beginTransaction();
        try {

            $cycle = cycle::find($cycle_id);
            $cycle->etat = $new_etat;
            $cycle->update();
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
            $cycle = $request->input();
            $cycle["session_id"] = $this->current_session_id($request);
            cycle::create($cycle);
            DB::commit();
            return ges_ajax_response(true);
        } catch(\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }

    public function edit(int $cycle_id){
        try {
            $cycle = cycle::find((int)$cycle_id);

            return ges_ajax_response(true, "", [
                "view" => view("inc.cycle.edit_form", compact("cycle"))->render()
            ]);
        } catch (\Exception $e) {
            return ges_ajax_response(false, $e);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
            $cycle = cycle::find((int)$request->input("cycle_id"));
            $cycle->intitule = $request->input("intitule");
            $cycle->update();
            DB::commit();
            return ges_ajax_response(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return ges_ajax_response(false, $e);
        }
    }
}
