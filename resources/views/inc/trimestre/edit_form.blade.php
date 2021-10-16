<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="trimestre_id" value="{{ $trimestre->trimestre_id }}">
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="intitule" class="form-control" value="{{ $trimestre->intitule }}"
                            required>
                        <label class="form-label">Intitulé</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="numero" class="form-control" value="{{ $trimestre->numero }}"
                            required min="1">
                        <label class="form-label">Numéro</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
        </div>
</form>
