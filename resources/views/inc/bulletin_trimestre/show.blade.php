<form action="{{ route('front.bulletin_trimestre.show') }}" method="POST" target="__black" id="form-next"
    style="z-index: 100;">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-md-6 col-sm-12" id="div-seq">
            <select name="trimestre_id" required>
                <option>Selectioner un trimestre</option>
                @foreach ($trimestres as $trimestre)
                    @if ($trimestre->etat)
                        <option value="{{ $trimestre->trimestre_id }}">{{ $trimestre->intitule }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12" id="div-click">
            <select name="classe_id" required>
                <option>Selectioner une classe</option>
                @foreach ($classes as $classe)
                    @if ($classe->etat)
                        <option value="{{ $classe->classe_id }}">{{ $classe->intitule }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer" id="btn-next">
        <button type="submit" class="btn btn-primary waves-effect">AFFICHER</button>
    </div>
</form>
