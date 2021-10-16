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
            <th>INTITULE TRIMESTRE</th>
            <th>NUMERO</th>
            @can('sequence-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($sequences as $sequence)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $sequence->intitule }}</td>
                <td>{{ $sequence->trimestre->intitule }}</td>
                <td>{{ $sequence->numero }}</td>
                @can('sequence-etat')
                    <td><span
                            class="btn label {{ $sequence->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $sequence->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('sequence-edit')
                        <a title="Edité" href="{{ route('front.sequence.edit', [$sequence->sequence_id]) }}" id="edit"
                            style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('sequence-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.sequence.delete', [$sequence->sequence_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('sequence-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.sequence.status', ['id' => $sequence->sequence_id, 'etat' => $sequence->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.sequence.add")
<!-- #END# Modal add -->
