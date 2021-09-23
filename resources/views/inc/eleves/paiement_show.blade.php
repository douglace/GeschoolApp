@php
    $j = 1;
@endphp
<div class="header">
    <div class="row" style="display: flex; align-items: center;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-2">
            <div class="col-sm-2">MONTANT:</div>
            <div class="col-sm-2">{{$paiement->montant}}XAF</div>
            <div class="col-sm-3">MONTANT PAYE:</div>
            <div class="col-sm-2">{{$paiement->montant_paye}}XAF</div>
            <div class="col-sm-1">RESTE:</div>
            <div class="col-sm-2">{{$paiement->reste}}XAF</div>
        </div>
    </div>
    <div class="row" style="display: flex; align-items: center;">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"
            style="display: flex; justify-content: flex-end;">
            <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal"
                    data-target="#modal-add">
                    <i class="material-icons">add</i>
                    <span>AJOUTER</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
            style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MONTANT PAYE</th>
                    <th>RESTE</th>
                    <th>DATE DE PAIEMENT</th>
                    <th style="width: 15%;">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paiement->tranches as $tranche)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$tranche->montant}}</td>
                        <td>{{$tranche->reste}}</td>
                        <td>{{$tranche->created_at}}</td>
                        </td>
                        <td>
                            <a title="Supprimé" id="delete" style="cursor: pointer;" onclick="showConfirmMessage('{{route('front.eleve.paiement.delete', [$tranche->tranche_id])}}')" class="link"><i
                                class="material-icons col-red">delete_forever</i></a>
                        </td>
                    </tr>
                    @php
                        $j++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>