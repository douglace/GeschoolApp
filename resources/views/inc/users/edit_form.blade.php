<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required>
                    <label class="form-label">Nom et prénom</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                    <label class="form-label">E-mail</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <select name="role" required>
                <option>Selectioner un role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{($user->roles->first() == null ? "0" : $user->roles->first()->id) == $role->id ? "selected" : ""}}>{{$role->name}}</option>
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