<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="cours_id" value="{{ $cours->cours_id }}">
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <select name="matiere_id" required>
                    <option>Selectioner une matiere</option>
                    @foreach ($matieres as $matiere)
                        @if ($matiere->etat == 1)
                            @if ($matiere->matiere_id == $cours->matiere->matiere_id)
                                <option value="{{ $matiere->matiere_id }}" selected>{{ $matiere->intitule }}</option>
                            @else
                                <option value="{{ $matiere->matiere_id }}">{{ $matiere->intitule }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <select name="classe_id" required>
                    <option>Selectioner une classe</option>
                    @foreach ($classes as $classe)
                        @if ($classe->etat == 1)
                            @if ($classe->classe_id == $cours->classe->classe_id)
                                <option value="{{ $classe->classe_id }}" selected>{{ $classe->intitule }}</option>
                            @else
                                <option value="{{ $classe->classe_id }}">{{ $classe->intitule }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select name="filiere_id" required>
                    <option>Selectioner un enseignant</option>
                    @foreach ($enseignants as $enseignant)
                        @if ($filiere->etat == 1)
                            @if ($enseignant->enseignant_id == $cours->enseignant->enseignant_id)
                                <option value="{{ $enseignant->enseignant_id }}" selected>
                                    {{ $enseignant->getFullName() }}</option>
                            @else
                                <option value="{{ $enseignant->enseignant_id }}">{{ $enseignant->getFullName() }}
                                </option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="coeficient" class="form-control" value="{{ $cours->coeficient }}"
                            required min="1">
                        <label class="form-label">Coeficient</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
        </div>
</form>
