@extends('layouts.app')

@section('content')
@php
    $sessions = App\Session::all();
    $setting = App\Setting::first();
@endphp
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><i class="material-icons">school</i>{{$setting->nom}}</a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{ route('front.setting.default_session') }}">
                @csrf
                <div class="msg">SESSION</div>
                <div class="row">
                    <div class="col-md-8">
                        <select name="session_id" required>
                            @foreach ($sessions as $session)
                                @if ($session->etat)
                                <option value="{{$session->session_id}}">{{$session->intitule}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-block bg-pink waves-effect">
                            {{ "SUIVANT" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
