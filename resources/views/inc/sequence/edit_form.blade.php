<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="sequence_id" value="{{$sequence->sequence_id}}">
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="intitule" class="form-control" value="{{$sequence->intitule}}" required>
                        <label class="form-label">Intitulé</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="numero" class="form-control" value="{{$sequence->numero}}" required min="1">
                        <label class="form-label">Numéro</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select name="trimestre_id" required>
                    <option>Selectioner un trimestre</option>
                    @foreach ($trimestres as $trimestre)
                        @if ($trimestre->etat == 1)
                            @if ($trimestre->trimestre_id == $sequence->trimestre->trimestre_id)
                                <option value="{{$trimestre->trimestre_id}}" selected>{{$trimestre->intitule}}</option>
                            @else
                                <option value="{{$trimestre->trimestre_id}}">{{$trimestre->intitule}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
        <button type="button" class="btn btn-danger waves-effect"
            data-dismiss="modal">FERMER</button>
    </div>
</form>