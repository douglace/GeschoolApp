<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="eleve_id" value="{{$eleve->eleve_id}}">
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
                    <input type="text" name="matricule" value="{{$eleve->matricul}}" class="form-control" required>
                    <label class="form-label">Matricule</label>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="nom" value="{{$eleve->nom}}" class="form-control" required>
                    <label class="form-label">Nom De Famille</label>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="prenom" value="{{$eleve->prenom}}" class="form-control" required>
                    <label class="form-label">Prénom</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="date" value="{{$eleve->date}}" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    <label class="form-label">Date De Naissance</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="lieu" value="{{$eleve->lieu}}" class="form-control" required>
                    <label class="form-label">Lieu De Naissance</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <select name="sexe" class="form-control" required>
                    <option>Sexe</option>
                    <option value="MASCULIN" {{$eleve->sexe == "MASCULIN" ? 'selected' : ''}}>MASCULIN</option>
                    <option value="FEMININ" {{$eleve->sexe == "FEMININ" ? 'selected' : ''}}>FEMININ</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="nationalite" value="{{$eleve->nationalite}}" class="form-control" required>
                    <label class="form-label">Nationalité</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="adresse" value="{{$eleve->adresse}}" class="form-control" required>
                    <label class="form-label">Adresse De L'Elève</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" name="tel" value="{{$eleve->tel}}" class="form-control">
                    <label class="form-label">Numéro De Téléphone</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" name="email" value="{{$eleve->email}}" class="form-control">
                    <label class="form-label">E-mail</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <h5>2. INFORMATIONS DE LA CLASSE</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <select name="classe_id" required>
                <option>Affecter une classe</option>
                @foreach ($classes as $classe)
                    @if ($classe->etat == 1)
                        @if ($classe->classe_id == $eleve->inscription($annee_id)->classe_id )
                            <option value="{{$classe->classe_id}}" selected>{{$classe->intitule}}</option>
                        @else
                            <option value="{{$classe->classe_id}}">{{$classe->intitule}}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <select name="statut" class="form-control" required>
                    <option>Choisir Le Statut De L'Elève </option>
                    <option value="Redoublant" {{$eleve->statut == "Redoublant" ? 'selected' : ''}}>Redoublant</option>
                    <option value="Non Redoublant" {{$eleve->statut == "Non Redoublant" ? 'selected' : ''}}>Non Redoublant</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <h5>3. INFORMATIONS MEDICAL</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="maladie" value="{{$eleve->maladie}}" class="form-control">
                    <label class="form-label">Maladies</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group form-float">
                <select name="handicap" class="form-control" required>
                    <option>Handicap</option>
                    <option value="Apte" {{$eleve->handicap == "Apte" ? 'selected' : ''}}>Apte</option>
                    <option value="Inapte" {{$eleve->handicap == "Inapte" ? 'selected' : ''}}>Inapte</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <h5>4. INFORMATIONS PARENTAL</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="nom_parent" value="{{$eleve->parent->nom_parent}}" class="form-control" required>
                    <label class="form-label">Nom Et Prénom Du Parent</label>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="profession" value="{{$eleve->parent->profession}}" class="form-control" required>
                    <label class="form-label">Profession</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" name="tel_parent" value="{{$eleve->parent->tel_parent}}" class="form-control" required>
                    <label class="form-label">Numéro De Téléphone</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" name="adresse_parent" value="{{$eleve->parent->adresse_parent}}" class="form-control" required>
                    <label class="form-label">Adresse</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group form-float">
                <select name="statut_parent" class="form-control" required>
                    <option>Statut Parental</option>
                    <option value="Père" {{$eleve->parent->statut_parent == "Père" ? 'selected' : ''}}>Père</option>
                    <option value="Mère" {{$eleve->parent->statut_parent == "Mère" ? 'selected' : ''}}>Mère</option>
                    <option value="Tuteur" {{$eleve->parent->statut_parent == "Tuteur" ? 'selected' : ''}}>Tuteur</option>
                    <option value="Tutrise" {{$eleve->parent->statut_parent == "Tutrise" ? 'selected' : ''}}>Tutrise</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" name="email_parent" value="{{$eleve->parent->email_parent}}" class="form-control">
                    <label class="form-label">E-mail</label>
                </div>
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