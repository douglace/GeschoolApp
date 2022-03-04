<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">AJOUT D'UN COURS DANS UN EMPLOI</h4>
            </div>
            <div class="modal-body" id="div-add">
                <form id="form-add">
                    @csrf
                    @method('POST')
                    <input type="text" class="hidden" name="classe_id" value="{{$classe->classe_id}}">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <select name="cours_id">
                                <option value="null">Cours</option>
                                @foreach ($courss as $cours)
                                    @if ($cours->etat)
                                        <option value="{{ $cours->cours_id }}">
                                            {{ $cours->matiere->intitule }} / {{ $cours->enseignant->getFullName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="jour_id" required>
                                <option value="null">Jour</option>
                                @foreach ($jours as $jour)
                                <option value="{{ $jour->jour_id }}">
                                    {{ $jour->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="time" name="heur_db" class="form-control" required >
                                    <label class="form-label">Heure de début</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="time" name="heur_fin" class="form-control" required >
                                    <label class="form-label">Heure de Fin</label>
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
