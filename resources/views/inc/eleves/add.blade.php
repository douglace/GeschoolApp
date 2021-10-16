<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">INSCRIPTION D'UN(E) ELEVE</h4>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <h5>1. INFORMATIONS PERSONNEL<em style="color: red;">*</em></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="matricul" class="form-control" required>
                                    <label class="form-label">Matricul<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="nom" class="form-control" required>
                                    <label class="form-label">Nom De Famille<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="prenom" class="form-control" required>
                                    <label class="form-label">Prénom<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="date" class="form-control" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" required>
                                    <label class="form-label">Date De Naissance<em
                                            style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="lieu" class="form-control" required>
                                    <label class="form-label">Lieu De Naissance<em
                                            style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <select name="sexe" class="form-control" required>
                                    <option>Sexe<em style="color: red;">*</em></option>
                                    <option value="MASCULIN">MASCULIN</option>
                                    <option value="FEMININ">FEMININ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="nationalite" class="form-control" required>
                                    <label class="form-label">Nationalité<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="adresse" class="form-control" required>
                                    <label class="form-label">Adresse De L'Elève<em
                                            style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="tel" min="600000000" class="form-control">
                                    <label class="form-label">Numéro De Téléphone</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control">
                                    <label class="form-label">E-mail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <h5>2. INFORMATIONS DE LA CLASSE (INSCRIPTION)<em style="color: red;">*</em></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="classe_id" required>
                                <option>Choisir la classe<em style="color: red;">*</em></option>
                                @foreach ($classes as $classe)
                                    @if ($classe->etat)
                                        <option value="{{ $classe->classe_id }}">{{ $classe->intitule }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <select name="statut" class="form-control" required>
                                    <option>Statut De L'Elève<em style="color: red;">*</em></option>
                                    <option value="Redoublant">Redoublant</option>
                                    <option value="Non Redoublant">Non Redoublant</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <h5>3. INFORMATIONS MEDICAL<em style="color: red;">*</em></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="maladie" class="form-control">
                                    <label class="form-label">Maladies</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <select name="handicap" class="form-control" required>
                                    <option>Handicap<em style="color: red;">*</em></option>
                                    <option value="Apte">Apte</option>
                                    <option value="Inapte">Inapte</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <h5>4. INFORMATIONS PARENTAL<em style="color: red;">*</em></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="nom_parent" class="form-control" required>
                                    <label class="form-label">Nom Et Prénom Du Parent<em
                                            style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="profession" class="form-control" required>
                                    <label class="form-label">Profession<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="tel_parent" class="form-control" min="600000000"
                                        required>
                                    <label class="form-label">Numéro De Téléphone<em
                                            style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="adresse_parent" class="form-control" required>
                                    <label class="form-label">Adresse<em style="color: red;">*</em></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <select name="statut_parent" class="form-control" required>
                                    <option>Statut Parental<em style="color: red;">*</em></option>
                                    <option value="Père">Père</option>
                                    <option value="Mère">Mère</option>
                                    <option value="Tuteur">Tuteur</option>
                                    <option value="Tutrise">Tutrise</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email_parent" class="form-control">
                                    <label class="form-label">E-mail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">ENREGISTRER</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
