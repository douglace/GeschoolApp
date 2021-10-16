@php
$setting = App\Setting::find(1);
$sessions = App\Session::all();
$annees = App\AnneeScolaire::all();
@endphp

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('front.index') }}"><i
                    class="material-icons">school</i>{{ $setting->nom }}</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Années scolaire -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        style="text-transform: uppercase;">
                        Année Scolaire en cours :
                        {{ App\AnneeScolaire::find(session()->get('annee_id') ?? 1)->getFullName() }}</a>
                    @can('change-annee-scolaire')
                        <ul class="dropdown-menu">
                            <li class="header">ANNEES SCOLAIRE</li>
                            <li class="body">
                                <ul class="menu">
                                    @foreach ($annees as $annee)
                                        <li>
                                            <a href="{{ route('front.setting.annee_current', [$annee->annee_id]) }}">
                                                <div class="menu-info">
                                                    <h4>{{ $annee->debut . '/' . $annee->fin }}</h4>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endcan
                </li>
                <!-- #END# Années scolaire -->
                <!-- Session -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        style="text-transform: uppercase;">
                        Session en cours: {{ App\Session::find(session()->get('session_id') ?? 1)->intitule }}
                    </a>
                    @can('change-session')
                        <ul class="dropdown-menu">
                            <li class="header">Sessions</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    @foreach ($sessions as $session)
                                        <li>
                                            <a href="{{ route('front.setting.session', [$session->session_id]) }}">
                                                <div class="menu-info">
                                                    <h4>{{ $session->intitule }}</h4>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endcan
                </li>
                <!-- #END# Session -->
                @can('Parametres')
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                                class="material-icons">more_vert</i></a></li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
