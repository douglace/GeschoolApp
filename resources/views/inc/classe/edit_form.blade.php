<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="classe_id" value="{{$classe->classe_id}}">
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="intitule" class="form-control" value="{{$classe->intitule}}" required>
                        <label class="form-label">Intitulé</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <select name="enseignant_id" required>
                    <option>Selectioner un enseignant titulaire</option>
                    @foreach ($enseignants as $enseignant)
                        @if ($enseignant->etat == 1)
                            @if ($enseignant->enseignant_id == ($matiere->responsable->enseignant_id ?? 0))
                                <option value="{{$enseignant->enseignant_id}}" selected>{{$enseignant->getFullName()}}</option>
                            @else
                                <option value="{{$enseignant->enseignant_id}}">{{$enseignant->getFullName()}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select name="cycle_id" required>
                    <option>Selectioner un cycle</option>
                    @foreach ($cycles as $cycle)
                        @if ($cycle->etat == 1)
                            @if ($cycle->cycle_id == $classe->cycle->cycle_id)
                                <option value="{{$cycle->cycle_id}}" selected>{{$cycle->intitule}}</option>
                            @else
                                <option value="{{$cycle->cycle_id}}">{{$cycle->intitule}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="montant" class="form-control" value="{{$classe->montant}}" required min="1">
                        <label class="form-label">Montant</label>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
        <button type="button" class="btn btn-danger waves-effect"
            data-dismiss="modal">FERMER</button>
    </div>
</form>