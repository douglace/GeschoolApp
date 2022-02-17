@php
$i = 1;
@endphp
<form id="form-next" style="z-index: 100;">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-md-6 col-sm-12" id="div-seq">
            <select name="sequence_id" required>
                <option>Selectioner une séquence</option>
                @foreach ($sequences as $sequence)
                    @if ($sequence->etat)
                        <option value="{{ $sequence->sequence_id }}">{{ $sequence->intitule }}</option>
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
        <button type="submit" class="btn btn-primary waves-effect">SUIVANT</button>
    </div>
</form>

<!-- Modal add -->
@include("inc.absences.add")
<!-- #END# Modal add -->
