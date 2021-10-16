<form id="form-edit">
    @csrf
    @method('POST')
    <input type="hidden" name="matiere_id" value="{{ $matiere->matiere_id }}">
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="intitule" class="form-control" value="{{ $matiere->intitule }}"
                            required>
                        <label class="form-label">Intitulé</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <select name="groupe_matiere_id" required>
                    <option>Groupe_matiere</option>
                    @foreach ($groupe_matieres as $groupe_matiere)
                        @if ($groupe_matiere->etat == 1)
                            @if ($groupe_matiere->groupe_matiere_id == $matiere->groupe_matiere->groupe_matiere_id)
                                <option value="{{ $groupe_matiere->groupe_matiere_id }}" selected>
                                    {{ $groupe_matiere->intitule }}</option>
                            @else
                                <option value="{{ $groupe_matiere->groupe_matiere_id }}">{{ $groupe_matiere->intitule }}
                                </option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <select name="enseignant_id" required>
                    <option>Enseignant responsable</option>
                    @foreach ($enseignants as $enseignant)
                        @if ($enseignant->etat == 1)
                            @if ($enseignant->enseignant_id == ($matiere->responsable->enseignant_id ?? 0))
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
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FERMER</button>
        </div>
</form>
