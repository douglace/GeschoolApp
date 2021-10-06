@php
    $i = 1;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
    style="text-align: center;">
    <thead>
        <tr>
            <tr>
                <th>ID</th>
                <th>INTITULE</th>
                <th>INTITULE CYCLE</th>
                <th>MONTANT(XAF)</th>
                <th>ENSEIGNANT TITULAIRE</th>
                <th>STATUT</th>
                <th style="width: 15%;">ACTIONS</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $classe)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$classe->intitule}}</td>
                <td>{{$classe->filiere->intitule}}</td>
                <td>{{$classe->montant}}</td>
                <td>{{$matiere->responsable->getFullName() ?? ""}}</td>
                <td><span class="btn label {{$classe->etat ? "label-success" : "label-danger"}} font-11 padding-4">{{$classe->etat ? "Activé" : "Desactivé"}}</span></td>
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit" style="display: none;"><i
                        class="material-icons">edit</i></a>
                    @can('classe-edit')
                    <a title="Edité" href="{{route('front.classe.edit', [$classe->classe_id])}}" id="edit" style="cursor: pointer;" class="link"><i
                        class="material-icons">edit</i></a>
                    @endcan
                    @can('classe-delete')
                    <a title="Supprimé" id="delete" style="cursor: pointer;" onclick="showConfirmMessage('{{route('front.classe.delete', [$classe->classe_id])}}')" class="link"><i
                        class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link" onclick="ChangeStatus('{{route('front.classe.status', ['id' =>$classe->classe_id, 'etat' => $classe->etat ? 0 : 1])}}')"><i
                            class="material-icons col-teal">repeat</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.classe.add")
<!-- #END# Modal add -->