@php
    $i = 1;
@endphp
<table id="table" class="table table-bordered table-striped table-hover js-basic-example dataTable"
    style="text-align: center;">
    <thead>
        <tr>
            <tr>
                <th>ID</th>
                <th>INTITULE</th>
                <th>STATUT</th>
                <th style="width: 15%;">ACTIONS</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($sessions as $session)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$session->intitule}}</td>
                <td><span class="btn label {{$session->etat ? "label-success" : "label-danger"}} font-11 padding-4">{{$session->etat ? "Activé" : "Desactivé"}}</span></td>
                <td>
                    <a title="Edité" id="edit-hidden" data-toggle="modal" data-target="#modal-edit" style="display: none;"><i
                        class="material-icons">edit</i></a>
                    <a title="Edité" href="{{route('front.session.edit', [$session->session_id])}}" id="edit" style="cursor: pointer;" class="link"><i
                            class="material-icons">edit</i></a>
                    <a title="Supprimé" id="delete" style="cursor: pointer;" onclick="showConfirmMessage('{{route('front.session.delete', [$session->session_id])}}')" class="link"><i
                            class="material-icons col-red">delete_forever</i></a>
                    <a title="Activé ou Désactivé" id="etat" style="cursor: pointer;" class="link" onclick="ChangeStatus('{{route('front.session.status', ['id' =>$session->session_id, 'etat' => $session->etat ? 0 : 1])}}')"><i
                            class="material-icons col-teal">repeat</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>