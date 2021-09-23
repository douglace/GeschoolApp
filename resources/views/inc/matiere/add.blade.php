<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">AJOUTER UNE MATIERE</h4>
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
                            <select name="groupe_matiere_id" required>
                                <option>Selectioner un groupe de matiere</option>
                                @foreach ($groupe_matieres as $groupe_matiere)
                                    @if ($groupe_matiere->etat)
                                    <option value="{{$groupe_matiere->groupe_matiere_id}}">{{$groupe_matiere->intitule}}</option>
                                    @endif
                                @endforeach
                            </select>
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