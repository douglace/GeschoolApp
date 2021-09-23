<div class="row">
    <div class="col-sm-6">
        <select name="cours_id" required>
            <option>Selectioner un cours</option>
            @foreach ($courss as $cours)
                @if ($cours->etat)
                <option value="{{$cours->cours_id}}">{{$cours->matiere->intitule}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<form id="form-add">
    @csrf
    @method('POST')
    <input type="hidden" name="sequence_id">
    <input type="hidden" name="classe_id">
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
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="{{$eleve->eleve_id}}" class="form-control" max="20" step="0.5" placeholder="0 - 20">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">ENREGISTRER</button>
        <button type="button" class="btn btn-danger waves-effect"
            data-dismiss="modal">FERMER</button>
    </div>
</form>