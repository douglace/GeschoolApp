<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="filiere_id" value="{{$filiere->filiere_id}}">
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="intitule" class="form-control" value="{{$filiere->intitule}}" required>
                        <label class="form-label">Intitulé</label>
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