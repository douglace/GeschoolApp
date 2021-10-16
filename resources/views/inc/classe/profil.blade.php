@extends('../../layout')

@section('title', 'Geschool-Année Scolaire')

@section('content')
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row" style="display: flex; align-items: center;">
                        <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                            <h2 style="text-transform: uppercase;">
                                LISTE DES ELEVES DE LA CLASSE DE {{ $classe->intitule }} | EFFECTIF:
                                {{ count(App\Inscription::getAllEleve($annee_id, $classe->classe_id)) }} |
                                TITULAIRE: <a title="Profile"
                                    href="{{ route('front.enseignant.profil', [$classe->titulaire->enseignant_id ?? 0]) }}"
                                    target="_blank" class="link">{{ $classe->titulaire->getFullName() ?? '' }}</a>
                            </h2>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6" style="display: flex; justify-content: flex-end;">
                            <div class="btn-group btn-group-sm">
                                @can('eleve-create')
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal"
                                        data-target="#add-modal">
                                        <i class="material-icons">add</i>
                                        <span>AJOUTER</span>
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive" id="div-show">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    @include("inc.eleves.edit")
    <!-- Modal edit -->

@endsection

@section('script')
    <script type="text/javascript">
        var initDataTable = function() {
            $('.js-basic-example').DataTable({
                responsive: true
            });
        }

        var initDataTableExport = function() {
            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }

        var showSuccessMessage = function() {
            swal("Good job!", "You clicked the button!", "success")
        }

        var showWarningMessage = function() {
            swal("Errors!", "Your imaginary file has been deleted.", "warning")
        }


        var show = function() {
            var div_show = $("#div-show")
            $.ajax({
                url: "{{ route('front.eleves.classe.index', [$classe->classe_id]) }}",
                success: function(data) {
                    if (data.status == true) {
                        div_show.html(data.data.view)
                        initDataTable()
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    }
                }
            })
        }

        var del = function(url) {
            $.ajax({
                url: url,
                success: function(data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        var ChangeStatus = function(url) {
            $.ajax({
                url: url,
                success: function(data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        var add = function(form_data) {
            $.ajax({
                url: "{{ route('front.eleve.creat') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                        $("#form-add").trigger('reset')
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    } else {
                        showWarningMessage()
                        console.log(data.message)
                    }
                }
            })
        }

        var showConfirmMessage = function(url) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                del(url)
            })
        }

        var edit = function(url) {
            var div_edit = $("#div-edit")
            $.ajax({
                url: url,
                success: function(data) {
                    if (data.status == true) {
                        div_edit.html(data.data.view)
                        $("#edit-hidden").click()
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        var update = function(form_data) {
            $.ajax({
                url: "{{ route('front.eleve.update') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        $(document).ready(function() {


            show()

            $(document).on("submit", "#form-add", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-add [data-dismiss='modal']").click()
                add(form_data)
            })

            $(document).on("click", "#edit", function(event) {
                event.preventDefault()
                var url = $(this).attr("href")
                edit(url)
            })

            $(document).on("submit", "#form-edit", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-edit [data-dismiss='modal']").click()
                update(form_data)
            })
        })
    </script>
@endsection
