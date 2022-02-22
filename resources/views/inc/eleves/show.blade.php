@php
    $i = 1;
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
        <th>CLASSE</th>
        @can('eleve-etat')
            <th>STATUT</th>
        @endcan
        <th style="width: 15%;">ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($eleves as $eleve)
        <tr>
            <td>{{ $i++ }}</td>
            <td><a title="Profile" onclick="show_student('{{ route('front.eleve.profil_infos', [$eleve->eleve_id]) }}')"
                   class="link">{{ $eleve->matricul }}</a></td>
            <td><a title="Profile" onclick="show_student('{{ route('front.eleve.profil_infos', [$eleve->eleve_id]) }}')"
                   class="link">{{ $eleve->nom }}</a></td>
            <td><a title="Profile" onclick="show_student('{{ route('front.eleve.profil_infos', [$eleve->eleve_id]) }}')"
                   class="link">{{ $eleve->prenom }}</a></td>
            <td>{{ $eleve->sexe }}</td>
            <td>{{ $eleve->date }}</td>
            <td><a title="Profile" onclick="show_classe('{{ route('front.classe.profil_infos', [$eleve->inscription($annee_id)->classe->classe_id ?? 0]) }}')" class="link">{{ $eleve->inscription($annee_id)->classe->intitule ?? 'Non Inscrit' }}</a>
            </td>
            @can('eleve-etat')
                <td><span
                        class="btn label {{ $eleve->etat ? 'label-success' : 'label-danger' }} font-11 padding-4">{{ $eleve->etat ? 'Activé' : 'Desactivé' }}</span>
                </td>
            @endcan
            <td>
                @can('eleve-profil')
                    <a title="Profile" href="{{ route('front.eleve.profil', [$eleve->eleve_id]) }}" target="_blank"
                       class="link"><i class="material-icons">content_paste</i></a>
                @endcan
                <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit"
                   style="display: none;"><i class="material-icons">edit</i></a>
                @can('eleve-edit')
                    <a title="Edité" href="{{ route('front.eleve.edit', [$eleve->eleve_id]) }}" id="edit"
                       style="cursor: pointer;" class="link"><i class="material-icons">edit</i></a>
                @endcan
                @can('eleve-delete')
                    <a title="Supprimé" id="delete" style="cursor: pointer;"
                       onclick="showConfirmMessage('{{ route('front.eleve.delete', [$eleve->eleve_id]) }}')"
                       class="link"><i class="material-icons col-red">delete_forever</i></a>
                @endcan
                @can('eleve-etat')
                    <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link"
                       onclick="ChangeStatus('{{ route('front.eleve.status', ['id' => $eleve->eleve_id, 'etat' => $eleve->etat ? 0 : 1]) }}')"><i
                            class="material-icons col-teal">repeat</i></a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Modal add -->
@include("inc.eleves.add")
<!-- #END# Modal add -->
