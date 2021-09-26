<select name="cours_id" required>
    <option>Selectioner un cours</option>
    @foreach ($courss as $cours)
        @if ($cours->etat)
            <option value="{{$cours->cours_id}}">{{$cours->matiere->intitule}}/{{$cours->enseignant->getFullName()}}</option>
        @endif
    @endforeach
</select>