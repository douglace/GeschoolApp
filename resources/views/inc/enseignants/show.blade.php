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
                <th>STATUT</th>
                <th style="width: 15%;">ACTIONS</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($enseignants as $enseignant)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$enseignant->matricul}}</td>
                <td>{{$enseignant->nom}}</td>
                <td>{{$enseignant->prenom}}</td>
                <td>{{$enseignant->sexe}}</td>
                <td>{{$enseignant->date}}</td>
                <td><span class="btn label {{$enseignant->etat ? "label-success" : "label-danger"}} font-11 padding-4">{{$enseignant->etat ? "Activé" : "Desactivé"}}</span></td>
                <td>
                    <a title="Profile" href="{{route('front.enseignant.profil', [$enseignant->enseignant_id])}}" target="_blank" class="link"><i class="material-icons">content_paste</i></a>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit" style="display: none;"><i
                        class="material-icons">edit</i></a>
                    <a title="Edité" href="{{route('front.enseignant.edit', [$enseignant->enseignant_id])}}" id="edit" style="cursor: pointer;" class="link"><i
                            class="material-icons">edit</i></a>
                    <a title="Supprimé" id="delete" style="cursor: pointer;" onclick="showConfirmMessage('{{route('front.enseignant.delete', [$enseignant->enseignant_id])}}')" class="link"><i
                            class="material-icons col-red">delete_forever</i></a>
                    <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link" onclick="ChangeStatus('{{route('front.enseignant.status', ['id' =>$enseignant->enseignant_id, 'etat' => $enseignant->etat ? 0 : 1])}}')"><i
                            class="material-icons col-teal">repeat</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.enseignants.add")
<!-- #END# Modal add -->

