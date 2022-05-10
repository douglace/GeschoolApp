<div class="row clearfix">
    <div class="col-xs-12">
        <div class="card">
            <div class="body">
                <div>
                    <div class="panel panel-default panel-post container-fluid">
                        <div class="row">
                            <div class="col-sm-2">
                                <span class="font-bold">INTITULE :</span>
                            </div>
                            <div class="col-sm-4">
                                <span style="text-transform: uppercase;">{{ $classe->intitule }}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="font-bold">CYCLE :</span>
                            </div>
                            <div class="col-sm-4">
                                <span style="text-transform: uppercase;">{{ $classe->cycle->intitule }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <span class="font-bold">TITULAIRE :</span>
                            </div>
                            <div class="col-sm-6">
                                <span
                                    style="text-transform: uppercase;">{{ $classe->titulaire->getFullName() }}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="font-bold">EFFECTIF :</span>
                            </div>
                            <div class="col-sm-2">
                                <span
                                    style="text-transform: uppercase;">{{ count(App\Inscription::getAllEleve($annee_id, $classe->classe_id)) }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span class="font-bold">MONTANT :</span>
                            </div>
                            <div class="col-sm-3">
                                <span style="text-transform: uppercase;">{{ $classe->montant }} FCFA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>LISTE DES ELEVES</div>
                @php
                    $i = 1;
                @endphp
                <table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
                    style="text-align: center;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MATRICUL</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>SEXE</th>
                            <th>DATE DE NAISSANCE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eleves as $eleve)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $eleve->matricul }}</td>
                                <td>{{ $eleve->nom }}</td>
                                <td>{{ $eleve->prenom }}</td>
                                <td>{{ $eleve->sexe }}</td>
                                <td>{{ $eleve->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>EMPLOI DU TEMPS</div>
                @php
                    $max_lenght = 0;
                    $emplois = [];
                    foreach ($jours as $jour) {
                        $lenght = count(
                            $jour
                                ->emplois()
                                ->where('annee_id', $annee_id)
                                ->where('classe_id', $classe->classe_id)
                                ->get()
                                ->all()
                        );
                        if ($lenght > $max_lenght) {
                            $max_lenght = $lenght;
                        }
                        $emplois[$jour->jour_id] = $jour
                            ->emplois()
                            ->where('annee_id', $annee_id)
                            ->where('classe_id', $classe->classe_id)
                            ->orderBy('heur_db', 'ASC')
                            ->get()
                            ->all();
                    }
                @endphp
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
                                            <span>{{ $emploi->cours->enseignant->getFullName() }}</span><br>
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
    </div>
</div>
