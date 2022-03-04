@php
$i = 1;
$j = false;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
    style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>MATRICUL</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
            <th>CLASSE(S) TITULARISE</th>
            @can('enseignant-etat')
                <th>STATUT</th>
            @endcan
            <th style="width: 15%;">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($enseignants as $enseignant)
            <tr>
                <td>{{ $i++ }}</td>
                <td><a title="Profile"
                        onclick="show_teacher('{{ route('front.enseignant.profil_infos', [$enseignant->enseignant_id ?? 0]) }}')"
                        class="link">{{ $enseignant->matricul }}</a></td>
                <td><a title="Profile"
                        onclick="show_teacher('{{ route('front.enseignant.profil_infos', [$enseignant->enseignant_id ?? 0]) }}')"
                        class="link">{{ $enseignant->nom }}</a></td>
                <td><a title="Profile"
                        onclick="show_teacher('{{ route('front.enseignant.profil_infos', [$enseignant->enseignant_id ?? 0]) }}')"
                        class="link">{{ $enseignant->prenom }}</a></td>
                <td>{{ $enseignant->sexe }}</td>
                <td>{{ $enseignant->date }}</td>
                <td style="display: block;">
                    @foreach ($enseignant->classes as $classe)
                        @if ($j)
                            {{ '; ' }}
                        @endif
                        <a title="Profile"
                            onclick="show_classe('{{ route('front.classe.profil_infos', [$classe->classe_id]) }}')"
                            class="link">{{ $classe->intitule }}</a>
                        @php
                            $j = true;
                        @endphp
                    @endforeach
                </td>
                @can('enseignant-etat')
                    <td><span
                            class="btn label {{ $enseignant->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $enseignant->etat ? 'Activé' : 'Desactivé' }}</span>
                    </td>
                @endcan
                <td>
                    @can('enseignant-profil')
                        <a title="Profile" href="{{ route('front.enseignant.profil', [$enseignant->enseignant_id]) }}"
                            target="_blank" class="link"><i class="material-icons">content_paste</i></a>
                    @endcan
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                        style="display: none;"><i class="material-icons">edit</i></a>
                    @can('enseignant-edit')
                        <a title="Edité" href="{{ route('front.enseignant.edit', [$enseignant->enseignant_id]) }}"
                            id="edit" style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                    @endcan
                    @can('enseignant-delete')
                        <a title="Supprimé" id="delete" style="cursor: pointer;"
                            onclick="showConfirmMessage('{{ route('front.enseignant.delete', [$enseignant->enseignant_id]) }}')"
                            class="link"><i class="material-icons col-red">delete_forever</i></a>
                    @endcan
                    @can('enseignant-etat')
                        <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                            onclick="ChangeStatus('{{ route('front.enseignant.status', ['id' => $enseignant->enseignant_id, 'etat' => $enseignant->etat ? 0 : 1]) }}')"><i
                                class="material-icons col-teal">repeat</i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.enseignants.add")
<!-- #END# Modal add -->
