<!-- Modal add -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">AJOUTER UN PAIEMENT</h4>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    @csrf
                    <input type="hidden" name="paiement_id" class="form-control" value="{{$eleve->paiement($annee_id)->paiement_id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="montant" class="form-control" min="1" required>
                                    <label class="form-label">MONTANT</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                    <label class="form-label">Date De Paiement</label>
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
<!-- #END# Modal add -->