@php
$i = 1;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
    style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>ANNEE DEBUT</th>
            <th>ANNEE FIN</th>
            @can('annee-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($annees as $annee)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $annee->debut }}</td>
                <td>{{ $annee->fin }}</td>
                @can('annee-etat')
                    <td><span
                            class="btn label {{ $annee->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $annee->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('annee-edit')
                        <a title="Edité" href="{{ route('front.annee.edit', [$annee->annee_id]) }}" id="edit"
                            style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('annee-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.annee.delete', [$annee->annee_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('annee-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.annee.status', ['id' => $annee->annee_id, 'etat' => $annee->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
