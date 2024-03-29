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
            <th>NUMERO</th>
            @can('trimestre-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($trimestres as $trimestre)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $trimestre->intitule }}</td>
                <td>{{ $trimestre->numero }}</td>
                @can('trimestre-etat')
                    <td><span
                            class="btn label {{ $trimestre->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $trimestre->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('trimestre-edit')
                        <a title="Edité" href="{{ route('front.trimestre.edit', [$trimestre->trimestre_id]) }}" id="edit"
                            style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('trimestre-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.trimestre.delete', [$trimestre->trimestre_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('trimestre-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.trimestre.status', ['id' => $trimestre->trimestre_id, 'etat' => $trimestre->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
