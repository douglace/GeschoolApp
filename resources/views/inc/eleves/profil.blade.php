@extends('../../layout')

@section('title', "PROFIL")

@section('content')
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="{{asset('assets/images/user-lg.jpg')}}" alt="AdminBSB - Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3>{{$eleve->getFullName()}}</h3>
                        <p class="font-bold font-16">{{$eleve->inscription($annee_id)->classe->intitule}}</p>
                        <p class="font-bold font-16">{{$eleve->statut}}</p>
                        <p>{{$eleve->matricul}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                    role="tab" data-toggle="tab">INFORMATIONS DE L'ELEVE</a></li>
                            <li role="presentation"><a href="#profile_settings" aria-controls="settings"
                                    role="tab" data-toggle="tab">INFORMATIONS DU PARENT(TUTEUR)</a></li>
                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings"
                                    role="tab" data-toggle="tab">PAIEMENTS</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                <div class="panel panel-default panel-post container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>1. INFORMATIONS PERSONNEL</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">NOM :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$eleve->nom}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">PRENOM :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$eleve->prenom}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">MATRICUL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$eleve->matricul}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">SEXE :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$eleve->sexe}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span class="font-bold">DATE DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->date}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">LIEU DE NAISSANCE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->lieu}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->tel}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">ADRESSE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->adresse}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">E-MAIL :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span>{{$eleve->email}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">NATIONALITE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->nationalite}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-post container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>2. INFORMATIONS MEDICAL</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">HANDICAP :</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span style="text-transform: uppercase;">{{$eleve->handicap}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="font-bold">MALADIES :</span>
                                        </div>
                                        <div class="col-sm-10">
                                            <span style="text-transform: uppercase;">{{$eleve->maladie}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                <div class="panel panel-default panel-post container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>1. INFORMATIONS PERSONNEL</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">NOM ET PRENOM :</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <span style="text-transform: uppercase;">{{$eleve->parent->nom_parent}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span class="font-bold">STATUT PARENTAL :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->parent->statut_parent}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="font-bold">PROFESSION :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->parent->profession}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="font-bold">NUMERO DE TELEPHONE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->parent->tel_parent}}</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="font-bold">ADRESSE :</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span style="text-transform: uppercase;">{{$eleve->parent->adresse_parent}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span class="font-bold">E-MAIL :</span>
                                        </div>
                                        <div class="col-sm-9">
                                            <span>{{$eleve->parent->email_parent}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                <div class="container-fluid">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card" id="div-show">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    @include("inc.eleves.paiement_add")
    <!-- Modal add -->
    
@endsection

@section('script')
    <script type="text/javascript">

        var initDataTable = function () {
            $('.js-basic-example').DataTable({
                responsive: true
            });
        }

        var initDataTableExport = function (){
            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }

        var showSuccessMessage = function () {
            swal("Good job!", "You clicked the button!", "success")
        }

        var showWarningMessage = function () {
            swal("Errors!", "Your imaginary file has been deleted.", "warning")
        }

    
        var show = function () {
            var div_show = $("#div-show")
            $.ajax({
                url: "{{route('front.eleve.paiement', [$eleve->eleve_id])}}",
                success: function (data) {
                    if (data.status == true) {
                        div_show.html(data.data.view)
                        initDataTable()
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    }
                }
            })
        }

        var del = function (url) {
            $.ajax({
                url: url,
                success: function (data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    }else{
                        showWarningMessage()
                    }
                }
            })
        }

        var add = function (form_data) {
            $.ajax({
                url: "{{route("front.eleve.paiement.add")}}",
                type: 'POST',
                data: form_data,
                success: function (data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                        $("#form-add").trigger('reset')
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    }else{
                        showWarningMessage()
                        console.log(data.message)
                    }
                }
            })
        }

        var showConfirmMessage = function (url) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                del(url)
            })
        }

        var edit = function (url) {
            var div_edit = $("#div-edit")
            $.ajax({
                url: url,
                success: function (data) {
                    if (data.status == true) {
                        div_edit.html(data.data.view)
                        $("#edit-hidden").click()
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    }else{
                        showWarningMessage()
                    }
                }
            })
        }

        var update = function (form_data) {
            $.ajax({
                url: "{{route("front.eleve.update")}}",
                type: 'POST',
                data: form_data,
                success: function (data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    }else{
                        showWarningMessage()
                    }
                }
            })
        }

        $(document).ready(function () {

            show()

            $(document).on("submit", "#form-add", function (event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-add [data-dismiss='modal']").click()
                add(form_data)
            })

            $(document).on("click", "#edit", function (event) {
                event.preventDefault()
                var url = $(this).attr("href")
                edit(url)
            })

            $(document).on("submit", "#form-edit", function (event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-edit [data-dismiss='modal']").click()
                update(form_data)
            })
        })
    </script>
@endsection-