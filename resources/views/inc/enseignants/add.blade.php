<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">ENREGISTREMENT D'UN(E) ENSEIGNANTS</h4>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    @csrf
                    @method('POST')
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
                                    <input type="text" name="matricul" class="form-control" required>
                                    <label class="form-label">Matricul</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="nom" class="form-control" required>
                                    <label class="form-label">Nom De Famille</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="prenom" class="form-control" required>
                                    <label class="form-label">Prénom</label>
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
                                    <label class="form-label">Date De Naissance</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="lieu" class="form-control" required>
                                    <label class="form-label">Lieu De Naissance</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <select name="sexe" class="form-control" required>
                                    <option>Sexe</option>
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
                                    <label class="form-label">Nationalité</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="adresse" class="form-control" required>
                                    <label class="form-label">Adresse De L'Elève</label>
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
                                <div class="form-line">
                                    <input type="text" name="diplome" class="form-control" required>
                                    <label class="form-label">Dernier diplome</label>
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
