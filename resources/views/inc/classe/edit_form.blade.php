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
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="niveau" class="form-control" value="{{$classe->niveau}}" required min="1">
                        <label class="form-label">Niveau</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select name="filiere_id" required>
                    <option>Selectioner un filiere</option>
                    @foreach ($filieres as $filiere)
                        @if ($filiere->etat == 1)
                            @if ($filiere->filiere_id == $classe->filiere->filiere_id)
                                <option value="{{$filiere->filiere_id}}" selected>{{$filiere->intitule}}</option>
                            @else
                                <option value="{{$filiere->filiere_id}}">{{$filiere->intitule}}</option>
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