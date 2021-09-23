<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="annee_id" value="{{$annee->annee_id}}">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" name="debut" value="{{$annee->debut}}" class="form-control" required min="2000">
                    <label class="form-label">Année Début</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" name="fin" value="{{$annee->fin}}" class="form-control" required min="2000">
                    <label class="form-label">Année Fin</label>
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