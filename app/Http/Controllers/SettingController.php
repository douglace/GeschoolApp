<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show(Request $request){
        return view("auth.session");
    }

    public function changeAnneeCurrent(Request $request, int $annee_id){
        $request->session()->put("annee_id", $annee_id);
        return back();
    }

    public function changeSession(Request $request, int $session_id){
        $request->session()->put("session_id", $session_id);
        return back();
    }

    public function defaultSession(Request $request){
        $session_id = $request->input("session_id");
        $annee_id = Setting::first()->annee_id;
        $request->session()->put("session_id", $session_id);
        $request->session()->put("annee_id", $annee_id);
        return redirect()->route("front.index");
    }
}
