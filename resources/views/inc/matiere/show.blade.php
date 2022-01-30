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
            <th>INTITULE GROUPE MATIERE</th>
            <th>ENSEIGNANT RESPONSABLE</th>
            @can('matiere-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($matieres as $matiere)
            <tr>
                <td>{{ $i++ }}</td>
                <td><a title="Profile" href="{{ route('front.matiere.profil', [$matiere->matiere_id ?? 0]) }}"
                        target="_blank" class="link">{{ $matiere->intitule }}</a></td>
                <td>{{ $matiere->groupe_matiere->intitule }}</td>
                <td><a title="Profile"
                    onclick="show_teacher('{{route('front.enseignant.profil_infos', [$matiere->responsable->enseignant_id ?? 0])}}')" class="link">{{ $matiere->responsable->getFullName() ?? '' }}</a></td>
                @can('matiere-etat')
                    <td><span
                            class="btn label {{ $matiere->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $matiere->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('matiere-edit')
                        <a title="Edité" href="{{ route('front.matiere.edit', [$matiere->matiere_id]) }}" id="edit"
                            style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('matiere-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.matiere.delete', [$matiere->matiere_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('matiere-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.matiere.status', ['id' => $matiere->matiere_id, 'etat' => $matiere->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.matiere.add")
<!-- #END# Modal add -->
