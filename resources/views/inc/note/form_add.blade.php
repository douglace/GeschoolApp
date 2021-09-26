@php
    $i = 1;
@endphp
<div class="col-md-12" style="margin: 0;padding:0;margin-bottom:5px;">
    <div class="col-md-4" style="margin: 0;padding:0;"><span>SEQUENCE: </span><span style="margin-left: 5px;">{{$sequence->intitule}}</span></div>
    <div class="col-md-4" style="margin: 0;padding:0;"><span>CLASSE:</span><span style="margin-left: 5px;">{{$cours->classe->intitule}}</span></div>
    <div class="col-md-4" style="margin: 0;padding:0;"><span>COURS: </span><span style="margin-left: 5px;">{{$cours->matiere->intitule}}</span></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6" style="margin: 0;padding:0;"><span>ENSEIGNANT(E): </span><span style="margin-left: 5px;">{{$cours->enseignant->getFullName()}}</span></div>
        <div class="col-md-6" style="margin: 0;padding:0;"><span>COEFICIENT:</span><span style="margin-left: 5px;">{{$cours->coeficient}}</span></div>
    </div>
</div>
<form id="form-add">
    @csrf
    @method('POST')
    <input type="hidden" name="sequence_id" value="{{$sequence->sequence_id}}">
    <input type="hidden" name="cours_id" value="{{$cours->cours_id}}">
    <table id="table" class="table table-bordered table-striped table-hover js-exportable dataTable"
        style="text-align: center;">
        <thead>
            <tr>
                <tr>
                    <th>ID</th>
                    <th>MATRICUL</th>
                    <th>NOM ET PRENOM</th>
                    <th style="max-width: 50px;">NOTE</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($eleves as $eleve)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$eleve->matricul}}</td>
                    <td>{{$eleve->getFullName()}}</td>
                    <td>
                        <div class="col-md-6" style="margin: 0; width:100%; padding:0;">
                            <div class="form-group form-float" style="margin: 0;">
                                <div class="form-line">
                                    <input type="number" name="{{$eleve->eleve_id}}" class="form-control" min="0" max="20" step="0.25" placeholder="0 - 20"
                                    style="padding: 0; text-align:center;">
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
        <button type="submit" class="btn btn-primary waves-effect">ENREGISTRER</button>
        <button type="button" class="btn btn-danger waves-effect"
            data-dismiss="modal">FERMER</button>
    </div>
</form>