<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="enseignant_id" value="{{$enseignant->enseignant_id}}">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <h5>1. INFORMATIONS PERSONNEL</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="matricule" value="{{$enseignant->matricul}}" class="form-control" required>
                    <label class="form-label">Matricule</label>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="nom" value="{{$enseignant->nom}}" class="form-control" required>
                    <label class="form-label">Nom De Famille</label>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="prenom" value="{{$enseignant->prenom}}" class="form-control" required>
                    <label class="form-label">Prénom</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="date" value="{{$enseignant->date}}" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    <label class="form-label">Date De Naissance</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="lieu" value="{{$enseignant->lieu}}" class="form-control" required>
                    <label class="form-label">Lieu De Naissance</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <select name="sexe" class="form-control" required>
                    <option>Sexe</option>
                    <option value="MASCULIN" {{$enseignant->sexe == "MASCULIN" ? 'selected' : ''}}>MASCULIN</option>
                    <option value="FEMININ" {{$enseignant->sexe == "FEMININ" ? 'selected' : ''}}>FEMININ</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="nationalite" value="{{$enseignant->nationalite}}" class="form-control" required>
                    <label class="form-label">Nationalité</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="adresse" value="{{$enseignant->adresse}}" class="form-control" required>
                    <label class="form-label">Adresse De L'Elève</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" name="tel" value="{{$enseignant->tel}}" class="form-control">
                    <label class="form-label">Numéro De Téléphone</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" name="email" value="{{$enseignant->email}}" class="form-control">
                    <label class="form-label">E-mail</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="diplome" value="{{$enseignant->diplome}}" class="form-control" required>
                    <label class="form-label">Dernier diplome</label>
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