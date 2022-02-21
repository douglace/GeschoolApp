<div class="row clearfix">
    <div class="col-xs-12 col-sm-3">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="{{ asset('assets/images/user-lg.jpg') }}" alt="AdminBSB - Profile Image"/>
                </div>
                <div class="content-area">
                    <h3>{{ $eleve->getFullName() }}</h3>
                    <p class="font-bold font-16">{{ $eleve->inscription($annee_id)->classe->intitule ?? 'Non inscrit' }}
                    </p>
                    <p class="font-bold font-16">{{ $eleve->statut }}</p>
                    <p>{{ $eleve->matricul }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                  data-toggle="tab">INFORMATIONS DE L'ELEVE</a></li>
                        <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab"
                                                   data-toggle="tab">INFORMATIONS DU PARENT(TUTEUR)</a></li>
                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab"
                                                   data-toggle="tab">PAIEMENTS</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">

                            <div class="panel panel-default panel-post container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>1. INFORMATIONS PERSONNEL</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="font-bold">NOM :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="text-transform: uppercase;">{{ $eleve->nom }}</span>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="font-bold">PRENOM :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="text-transform: uppercase;">{{ $eleve->prenom }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="font-bold">MATRICUL :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="text-transform: uppercase;">{{ $eleve->matricul }}</span>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="font-bold">SEXE :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="text-transform: uppercase;">{{ $eleve->sexe }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span class="font-bold">DATE DE NAISSANCE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="text-transform: uppercase;">{{ $eleve->date }}</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="font-bold">LIEU DE NAISSANCE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="text-transform: uppercase;">{{ $eleve->lieu }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="text-transform: uppercase;">{{ $eleve->tel }}</span>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="font-bold">ADRESSE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="text-transform: uppercase;">{{ $eleve->adresse }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="font-bold">E-MAIL :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span>{{ $eleve->email }}</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="font-bold">NATIONALITE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style="text-transform: uppercase;">{{ $eleve->nationalite }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default panel-post container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>2. INFORMATIONS MEDICAL</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="font-bold">HANDICAP :</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="text-transform: uppercase;">{{ $eleve->handicap }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="font-bold">MALADIES :</span>
                                    </div>
                                    <div class="col-sm-10">
                                        <span style="text-transform: uppercase;">{{ $eleve->maladie }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                            <div class="panel panel-default panel-post container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>1. INFORMATIONS PERSONNEL</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="font-bold">NOM ET PRENOM :</span>
                                    </div>
                                    <div class="col-sm-8">
                                            <span
                                                style="text-transform: uppercase;">{{ $eleve->parent->nom_parent }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span class="font-bold">STATUT PARENTAL :</span>
                                    </div>
                                    <div class="col-sm-3">
                                            <span
                                                style="text-transform: uppercase;">{{ $eleve->parent->statut_parent }}</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="font-bold">PROFESSION :</span>
                                    </div>
                                    <div class="col-sm-3">
                                            <span
                                                style="text-transform: uppercase;">{{ $eleve->parent->profession }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                            <span
                                                style="text-transform: uppercase;">{{ $eleve->parent->tel_parent }}</span>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="font-bold">ADRESSE :</span>
                                    </div>
                                    <div class="col-sm-3">
                                            <span
                                                style="text-transform: uppercase;">{{ $eleve->parent->adresse_parent }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span class="font-bold">E-MAIL :</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span>{{ $eleve->parent->email_parent }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                            <div class="container-fluid">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card" id="div-show">
                                            @php
                                                $j = 1;
                                            @endphp
                                            <div class="header">
                                                <div class="row" style="display: flex; align-items: center;">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-2">
                                                        <div class="col-sm-2">MONTANT:</div>
                                                        <div class="col-sm-2">{{ $paiement->montant }}XAF</div>
                                                        <div class="col-sm-3">MONTANT PAYE:</div>
                                                        <div class="col-sm-2">{{ $paiement->montant_paye }}XAF</div>
                                                        <div class="col-sm-1">RESTE:</div>
                                                        <div class="col-sm-2">{{ $paiement->reste }}XAF</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                                        style="text-align: center;">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>MONTANT PAYE</th>
                                                            <th>RESTE</th>
                                                            <th>DATE DE PAIEMENT</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($paiement->tranches as $tranche)
                                                            <tr>
                                                                <td>{{ $j }}</td>
                                                                <td>{{ $tranche->montant }}</td>
                                                                <td>{{ $tranche->reste }}</td>
                                                                <td>{{ $tranche->created_at }}</td>
                                                            </tr>
                                                            @php
                                                                $j++;
                                                            @endphp
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
