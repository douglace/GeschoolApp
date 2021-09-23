@php
    $i = 1;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
    style="text-align: center;">
    <thead>
        <tr>
            <tr>
                <th>ID</th>
                <th>MATRICUL</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SEXE</th>
                <th>DATE DE NAISSANCE</th>
                <th>CLASSE</th>
                <th>STATUT</th>
                <th style="width: 15%;">ACTIONS</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($eleves as $eleve)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$eleve->matricul}}</td>
                <td>{{$eleve->nom}}</td>
                <td>{{$eleve->prenom}}</td>
                <td>{{$eleve->sexe}}</td>
                <td>{{$eleve->date}}</td>
                <td>{{$eleve->inscription($annee_id)->classe->intitule}}</td>
                <td><span class="btn label {{$eleve->etat ? "label-success" : "label-danger"}} font-11 padding-4">{{$eleve->etat ? "Activé" : "Desactivé"}}</span></td>
                <td>
                    <a title="Profile" href="{{route('front.eleve.profil', [$eleve->eleve_id])}}" target="_blank" class="link"><i class="material-icons">content_paste</i></a>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit" style="display: none;"><i
                        class="material-icons">edit</i></a>
                    <a title="Edité" href="{{route('front.eleve.edit', [$eleve->eleve_id])}}" id="edit" style="cursor: pointer;" class="link"><i
                            class="material-icons">edit</i></a>
                    <a title="Supprimé" id="delete" style="cursor: pointer;" onclick="showConfirmMessage('{{route('front.eleve.delete', [$eleve->eleve_id])}}')" class="link"><i
                            class="material-icons col-red">delete_forever</i></a>
                    <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link" onclick="ChangeStatus('{{route('front.eleve.status', ['id' =>$eleve->eleve_id, 'etat' => $eleve->etat ? 0 : 1])}}')"><i
                            class="material-icons col-teal">repeat</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.eleves.add")
<!-- #END# Modal add -->

