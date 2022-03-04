@php
$max_lenght = 0;
$emplois = [];
foreach ($jours as $jour) {
    $lenght = count(
        $jour
            ->emplois()
            ->where('annee_id', $annee_id)
            ->where('classe_id', $classe->classe_id)
            ->get()
            ->all(),
    );
    if ($lenght > $max_lenght) {
        $max_lenght = $lenght;
    }
    $emplois[$jour->jour_id] = $jour
        ->emplois()
        ->where('annee_id', $annee_id)
        ->where('classe_id', $classe->classe_id)
        ->orderBy('heur_db', 'ASC')
        ->get()
        ->all();
}
@endphp
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <div class="row" style="display: flex; align-items: center;">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                    <h2>
                        EMPLOI DU TEMPS DE LA CLASSE DE {{ $classe->intitule }}
                    </h2>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="display: flex; justify-content: flex-end;">
                    <div class="btn-group btn-group-sm">
                        @can('emploies-add')
                            <button type="button" id="btn-add" class="btn btn-primary waves-effect" data-toggle="modal"
                                data-target="#add-modal">
                                <i class="material-icons">save</i>
                                <span>AJOUTER</span>
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover js-exportable dataTable"
                    style="text-align: center;">
                    <thead>
                        <tr>
                            @foreach ($jours as $jour)
                                <th>{{ $jour->intitule }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $max_lenght; $i++)
                            <tr>
                                <td style="display: none;">{{ $i }}</td>

                                @foreach ($jours as $jour)
                                    @php
                                        $emploi = $emplois[$jour->jour_id][$i] ?? false;
                                    @endphp
                                    @if ($emploi && $emploi->cours_id != null)
                                        <td style="position: relative;">
                                            <a title="Edité" id="edit-hidden" data-toggle="modal"
                                                data-target="#modal-edit" style="display: none;"><i
                                                    class="material-icons">edit</i></a>
                                            <a title="Edité"
                                                href="{{ route('front.emploies.edit', [$emploi->emploi_id]) }}"
                                                id="edit" style="cursor: pointer; position: absolute;top:0;right:0;"
                                                class="link"><i class="material-icons">edit</i></a>
                                            <a title="Supprimé" id="delete"
                                                style="cursor: pointer; position: absolute;bottom:0;left:0;"
                                                onclick="showConfirmMessage('{{ route('front.emploies.delete', [$emploi->emploi_id]) }}')"
                                                class="link"><i
                                                    class="material-icons col-red">delete_forever</i></a>
                                            <span
                                                style="font-size:18px;font-weight:600;">{{ $emploi->cours->matiere->intitule }}</span><br>
                                            <span>{{ $emploi->cours->enseignant->getFullName() }}</span><br>
                                            <span>{{ $emploi->heur_db }} - {{ $emploi->heur_fin }}</span>
                                        </td>
                                    @elseif ($emploi && $emploi->cours_id == null)
                                        <td style="position: relative;">
                                            PAUSE <br>
                                            <span>{{ $emploi->heur_db }} - {{ $emploi->heur_fin }}</span><a
                                                title="Edité" id="edit-hidden" data-toggle="modal"
                                                data-target="#modal-edit" style="display: none;"><i
                                                    class="material-icons">edit</i></a>
                                            <a title="Edité"
                                                href="{{ route('front.emploies.edit', [$emploi->emploi_id]) }}"
                                                id="edit" style="cursor: pointer; position: absolute;top:0;right:0;"
                                                class="link"><i class="material-icons">edit</i></a>
                                            <a title="Supprimé" id="delete"
                                                style="cursor: pointer; position: absolute;bottom:0;left:0;"
                                                onclick="showConfirmMessage('{{ route('front.emploies.delete', [$emploi->emploi_id]) }}')"
                                                class="link"><i
                                                    class="material-icons col-red">delete_forever</i></a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal add -->
@include("inc.emploies.add")
<!-- #END# Modal add -->
