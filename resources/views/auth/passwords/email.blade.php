@extends('layouts.app')

@section('content')
    @php
    $setting = App\Setting::first();
    @endphp
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><i class="material-icons">school</i>{{ $setting->nom }}</a>
        </div>
        <div class="card">
            <div class="body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col">{{ __('Modifier votre mot de passe') }}</div>
                    <div class="form-group form-float m-t-20">
                        <div class="form-line">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
