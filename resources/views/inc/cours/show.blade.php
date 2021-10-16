@php
$i = 1;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-exportable dataTable"
    style="text-align: center;">
    <thead>
        <tr>
        <tr>
            <th>ID</th>
            <th>MATIERE</th>
            <th>ENSEIGNANT(E)</th>
            <th>CLASSE</th>
            <th>COEFICIENT</th>
            @can('cours-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($courss as $cours)
            <tr>
                <td>{{ $i++ }}</td>
                <td><a title="Profile" href="{{ route('front.matiere.profil', [$cours->matiere->matiere_id ?? 0]) }}"
                        target="_blank" class="link">{{ $cours->matiere->intitule }}</a></td>
                <td><a title="Profile"
                        href="{{ route('front.enseignant.profil', [$cours->enseignant->enseignant_id ?? 0]) }}"
                        target="_blank" class="link">{{ $cours->enseignant->getFullName() }}</a></td>
                <td><a title="Profile" href="{{ route('front.classe.profil', [$cours->classe->classe_id ?? 0]) }}"
                        target="_blank" class="link">{{ $cours->classe->intitule }}</a></td>
                <td>{{ $cours->coeficient }}</td>
                @can('cours-etat')
                    <td><span
                            class="btn label {{ $cours->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $cours->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    @can('cours-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.cours.delete', [$cours->cours_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('cours-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.cours.status', ['id' => $cours->cours_id, 'etat' => $cours->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.cours.add")
<!-- #END# Modal add -->
