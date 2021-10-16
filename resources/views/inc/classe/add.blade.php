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
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="intitule" class="form-control" required>
                                    <label class="form-label">Intitulé</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select name="enseignant_id" required>
                                <option>Enseignant titulaire</option>
                                @foreach ($enseignants as $enseignant)
                                    @if ($enseignant->etat)
                                        <option value="{{ $enseignant->enseignant_id }}">
                                            {{ $enseignant->getFullName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="cycle_id" required>
                                <option>Selectioner une cycle</option>
                                @foreach ($cycles as $cycle)
                                    @if ($cycle->etat)
                                        <option value="{{ $cycle->cycle_id }}">{{ $cycle->intitule }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="montant" class="form-control" required min="1">
                                    <label class="form-label">Montant</label>
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
