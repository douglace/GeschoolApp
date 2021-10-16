<form id="form-edit">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" value="{{ $role->name }}" name="intitule" class="form-control" required>
                    <label class="form-label">Intitulé</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <select id="optgroup1" name="permissions" class="ms" multiple="multiple">
                @foreach ($rolePermissions as $permission)
                    <optgroup label="Liste Les Permissions">
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect hidden">MODIFIER</button>
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
    </div>
</form>
