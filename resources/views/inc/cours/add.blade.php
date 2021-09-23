<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">AJOUTER UNE CLASSE</h4>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="matiere_id" required>
                                <option>Selectioner une matiere</option>
                                @foreach ($matieres as $matiere)
                                    @if ($matiere->etat)
                                    <option value="{{$matiere->matiere_id}}">{{$matiere->intitule}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="classe_id" required>
                                <option>Selectioner une classe</option>
                                @foreach ($classes as $classe)
                                    @if ($classe->etat)
                                    <option value="{{$classe->classe_id}}">{{$classe->intitule}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="enseignant_id" required>
                                <option>Selectioner un(e) enseignant(e)</option>
                                @foreach ($enseignants as $enseignant)
                                    @if ($enseignant->etat)
                                    <option value="{{$enseignant->enseignant_id}}">{{$enseignant->getFullName()}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="coeficient" class="form-control" required min="1">
                                    <label class="form-label">Coeficient</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">ENREGISTRER</button>
                        <button type="button" class="btn btn-danger waves-effect"
                            data-dismiss="modal">FERMER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>