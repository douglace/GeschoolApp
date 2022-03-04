<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="emploi_id" value="{{ $emploi->emploi_id }}">
    <input type="hidden" name="classe_id" value="{{$emploi->classe_id}}">
    <div class="row">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-6">
                <select name="cours_id">
                    <option value="null">Cours</option>
                    @foreach ($courss as $cours)
                        @if ($cours->etat)
                            <option value="{{ $cours->cours_id }}" {{$cours->cours_id == $emploi->cours_id ? 'selected' : null}}>
                                {{ $cours->matiere->intitule }} / {{ $cours->enseignant->getFullName() }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select name="jour_id" required>
                    <option value="null">Jour</option>
                    @foreach ($jours as $jour)
                    <option value="{{ $jour->jour_id }}" {{$jour->jour_id == $emploi->jour_id ? 'selected' : null}}>
                        {{ $jour->intitule }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="time" name="heur_db" class="form-control" required value="{{$emploi->heur_db}}">
                        <label class="form-label">Heure de début</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="time" name="heur_fin" class="form-control" required value="{{$emploi->heur_fin}}">
                        <label class="form-label">Heure de Fin</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
        </div>
</form>
