                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="{{ asset('assets/images/user-lg.jpg') }}"
                                        alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <h3>{{ $enseignant->nom . ' ' . $enseignant->prenom }}</h3>
                                    <p>{{ $enseignant->matricul }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9">
                        <div class="card">
                            <div class="body">
                                <div class="panel panel-default panel-post container-fluid">
                                    <div class="row m-t-10">
                                        <div class="col-sm-2">
                                            <span class="font-bold">NOM :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{ $enseignant->nom }}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">PRENOM :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{ $enseignant->prenom }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">MATRICUL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{ $enseignant->matricul }}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">SEXE :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{ $enseignant->sexe }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span class="font-bold">DATE DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{ $enseignant->date }}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">LIEU DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{ $enseignant->lieu }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{ $enseignant->tel }}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">ADRESSE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{ $enseignant->adresse }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">E-MAIL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span>{{ $enseignant->email }}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">NATIONALITE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span
                                                style="text-transform: uppercase;">{{ $enseignant->nationalite }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">DERNIER DIPLOME :</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <span style="text-transform: uppercase;">{{ $enseignant->diplome }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $max_lenght = 0;
                    $emplois = [];
                    foreach ($jours as $jour) {
                        $lenght = count(
                            $jour
                                ->emplois()
                                ->where('emplois.annee_id', $annee_id)
                                ->join('cours', 'cours.cours_id', '=', 'emplois.cours_id')
                                ->join('enseignants', 'enseignants.enseignant_id', '=', 'cours.enseignant_id')
                                ->where('enseignants.enseignant_id', $enseignant->enseignant_id)
                                ->get()
                                ->all()
                        );
                        if ($lenght > $max_lenght) {
                            $max_lenght = $lenght;
                        }
                        $emplois[$jour->jour_id] = $jour
                                ->emplois()
                                ->where('emplois.annee_id', $annee_id)
                                ->join('cours', 'cours.cours_id', '=', 'emplois.cours_id')
                                ->join('enseignants', 'enseignants.enseignant_id', '=', 'cours.enseignant_id')
                                ->where('enseignants.enseignant_id', $enseignant->enseignant_id)
                                ->orderBy('emplois.heur_db', 'ASC')
                                ->get()
                                ->all();
                    }
                @endphp

                <div class="panel panel-default panel-post container-fluid">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped table-hover js-exportable dataTable"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    @foreach ($jours as $jour)
                                        <th>{{ $jour->intitule }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $max_lenght; $i++)
                                    <tr>
                                        <td style="display: none;">{{ $i }}</td>
                                        @foreach ($jours as $jour)
                                            @php
                                                $emploi = $emplois[$jour->jour_id][$i] ?? false;
                                            @endphp
                                            @if ($emploi && $emploi->cours_id != null)
                                                <td>
                                                    <span
                                                        style="font-size:18px;font-weight:600;">{{ $emploi->cours->matiere->intitule }}</span><br>
                                                    <span>{{ $emploi->classe->intitule }}</span><br>
                                                    <span>{{ $emploi->heur_db }} - {{ $emploi->heur_fin }}</span>
                                                </td>
                                            @elseif ($emploi && $emploi->cours_id == null)
                                                <td>
                                                    PAUSE <br>
                                                    <span>{{ $emploi->heur_db }} - {{ $emploi->heur_fin }}</span>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
