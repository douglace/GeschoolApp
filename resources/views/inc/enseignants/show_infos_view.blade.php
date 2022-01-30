                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="{{ asset('assets/images/user-lg.jpg') }}" alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <h3>{{$enseignant->nom. " ". $enseignant->prenom}}</h3>
                                    <p>{{$enseignant->matricul}}</p>
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
                                            <span style="text-transform: uppercase;">{{$enseignant->nom}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">PRENOM :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$enseignant->prenom}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">MATRICUL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$enseignant->matricul}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">SEXE :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$enseignant->sexe}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span class="font-bold">DATE DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$enseignant->date}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">LIEU DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$enseignant->lieu}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$enseignant->tel}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">ADRESSE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$enseignant->adresse}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">E-MAIL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span>{{$enseignant->email}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">NATIONALITE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$enseignant->nationalite}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">DERNIER DIPLOME :</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <span style="text-transform: uppercase;">{{$enseignant->diplome}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                $i = 1;
                @endphp

                <div class="panel panel-default panel-post container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable profil-infos"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>CLASSES</th>
                                    <th>MATIERES</th>
                                    <th>COEFICIENT</th>
                                    <th>JOUR(S) ET HEURE(S)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cours as $cour)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$cour->classe->intitule}}</td>
                                    <td>{{$cour->matiere->intitule}}</td>
                                    <td>{{$cour->coeficient}}</td>
                                    <td>------ / 12:00</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
