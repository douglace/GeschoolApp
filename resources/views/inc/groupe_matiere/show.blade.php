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
            @can('groupe-matiere-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($groupe_matieres as $groupe_matiere)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $groupe_matiere->intitule }}</td>
                @can('groupe-matiere-etat')
                    <td><span
                            class="btn label {{ $groupe_matiere->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $groupe_matiere->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('groupe-matiere-edit')
                        <a title="Edité"
                            href="{{ route('front.groupe_matiere.edit', [$groupe_matiere->groupe_matiere_id]) }}" id="edit"
                            style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('groupe-matiere-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.groupe_matiere.delete', [$groupe_matiere->groupe_matiere_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('groupe-matiere-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.groupe_matiere.status', ['id' => $groupe_matiere->groupe_matiere_id, 'etat' => $groupe_matiere->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.groupe_matiere.add")
<!-- #END# Modal add -->
