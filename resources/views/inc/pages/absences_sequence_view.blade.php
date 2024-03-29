@extends('../../layout')

@section('title', 'Geschool-Absences Séquencielles')

@section('css')
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100% !important;
            font-size: 24px !important;
        }

        #div-show {
            overflow: initial !important;
        }

    </style>
@endsection

@section('content')
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row" style="display: flex; align-items: center;">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                            <h2>
                                ABSENCES DES ELEVES SEQUENTIELLES
                            </h2>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="display: flex; justify-content: flex-end;">
                            <div class="btn-group btn-group-sm" style="display: none;">
                                @can('note-create')
                                    <button type="button" id="btn-add" class="btn btn-primary waves-effect" data-toggle="modal"
                                        data-target="#add-modal">
                                        <i class="material-icons">save</i>
                                        <span>ENREGISTRER</span>
                                    </button>
                                @endcan
                            </div>
                            <div class="btn-group btn-group-sm" style="display: none;">
                                <button type="button" id="btn-edit" class="btn btn-primary waves-effect" data-toggle="modal"
                                    data-target="#modal-edit">
                                    <i class="material-icons">save</i>
                                    <span>EDITER</span>
                                </button>
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
    @include("inc.absences.edit")
    <!-- Modal edit -->

@endsection

@section('script')
    <script type="text/javascript">
        var btn_next = null

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
                url: "{{ route('front.absences_sequence.index') }}",
                success: function(data) {
                    if (data.status == true) {
                        div_show.html(data.data.view)
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                        btn_next = $("#btn-next")
                        btn_next.hide()
                    }
                }
            })
        }

        var show_form_add = function(form_data) {
            var div_add = $("#div-add")
            $.ajax({
                url: "{{ route('front.absences.show_form_add_sequence') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        div_add.html(data.data.view)
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                        initDataTable()
                        initDataTableExport()
                    } else {
                        console.log(data)
                        showWarningMessage()
                    }
                }
            })
        }

        var add = function(form_data) {
            $.ajax({
                url: "{{ route('front.absences_sequence.creat') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        show()
                        showSuccessMessage()
                    } else {
                        console.log(data.message)
                        showWarningMessage()
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

        var update = function(form_data) {
            $.ajax({
                url: "{{ route('front.absences_sequence.creat') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        $(document).ready(function() {

            show()

            $(document).on("submit", "#form-next", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                show_form_add(form_data)
                $("#btn-add").click()
            })

            $(document).on("submit", "#form-add", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-add [data-dismiss='modal']").click()
                add(form_data)
            })

            $(document).on("click", "#form-next #div-click [data-original-index]", function(event) {
                btn_next.show()
            })

            $(document).on("click", "#form-next #div-click [data-original-index='0']", function(event) {
                btn_next.hide()
            })

            $(document).on("click", "#form-next #div-seq [data-original-index='0']", function(event) {
                btn_next.hide()
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
