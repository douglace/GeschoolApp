<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="id_role" value="{{$role->id}}">
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
                @foreach ($permissions as $permission)
                    <optgroup label="Liste Les Permissions">
                        <option value="{{ $permission->id }}" {{in_array($permission->id, $rolePermissions) ? 'selected' : null}}>{{ $permission->name }}</option>
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
    </div>
</form>
