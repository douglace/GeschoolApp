@php
$i = 1;
@endphp
<div class="col-md-12" style="margin: 0;padding:0;margin-bottom:5px;">
    <div class="col-md-6" style="margin: 0;padding:0;"><span>SEQUENCE: </span><span
            style="margin-left: 5px;">{{ $sequence->intitule }}</span></div>
    <div class="col-md-6" style="margin: 0;padding:0;"><span>CLASSE:</span><span
            style="margin-left: 5px;">{{ $classe->intitule }}</span></div>
</div>
<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="sequence_id" value="{{ $sequence->sequence_id }}">
    <input type="hidden" name="classe_id" value="{{ $classe->classe_id }}">
    <table id="table" class="table table-bordered table-striped table-hover js-exportable dataTable"
        style="text-align: center;">
        <thead>
            <tr>
                <th>ID</th>
                <th>MATRICUL</th>
                <th>NOM ET PRENOM</th>
                <th style="max-width: 50px;">NOMBRE D'HEURE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absences as $absence)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $absence->eleve->matricul }}</td>
                    <td>{{ $absence->eleve->getFullName() }}</td>
                    <td>
                        <div class="col-md-6" style="margin: 0; width:100%; padding:0;">
                            <div class="form-group form-float" style="margin: 0;">
                                <div class="form-line">
                                    <input type="number" name="{{ $absence->eleve->eleve_id }}"
                                        value="{{ $absence->nb_heure }}" class="form-control"
                                        min="0" step="1" placeholder="0 - N"
                                        style="padding: 0; text-align:center;" @cannot('absences-edit') disabled @endcannot>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <div class="modal-footer">
        @can('absences-edit')
            <button type="submit" class="btn btn-primary waves-effect">ENREGISTRER</button>
        @endcan
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
    </div>
</form>
