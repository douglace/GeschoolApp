@php
    $i = 1;
@endphp
<form id="form-next">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-sm-6">
            
        <div class="col-md-6">
            <select name="sequence_id" required>
                <option>Selectioner une séquence</option>
                @foreach ($sequences as $sequence)
                    @if ($sequence->etat)
                    <option value="{{$sequence->sequence_id}}">{{$sequence->intitule}}</option>
                    @endif
                @endforeach
            </select>
        </div>
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
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">SUIVANT</button>
    </div>
</form>

<form id="form-edit_show">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-sm-6">
            
        <div class="col-md-6">
            <select name="sequence_id" required>
                <option>Selectioner une séquence</option>
                @foreach ($sequences as $sequence)
                    @if ($sequence->etat)
                    <option value="{{$sequence->sequence_id}}">{{$sequence->intitule}}</option>
                    @endif
                @endforeach
            </select>
        </div>
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
        <div class="col-sm-6">
            <select name="cours_id" required>
                <option>Selectioner un cours</option>
                @foreach ($courss as $cours)
                    @if ($cours->etat)
                    <option value="{{$cours->cours_id}}">{{$cours->matiere->intitule}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect">MODIFIER</button>
    </div>
</form>

<!-- Modal add -->
@include("inc.note.add")
<!-- #END# Modal add -->