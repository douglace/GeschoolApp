@extends('../../layout')

@section('title', 'Geschool-Emplois du Temps')

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
                                EMPLOIS DU TEMPS
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

    <!-- Basic Examples -->
    <div class="row clearfix" id="div-show-second">

    </div>
    <!-- #END# Basic Examples -->
    @include("inc.emploies.edit")
    <!-- Modal edit -->

@endsection

@section('script')
    <script type="text/javascript">
        var btn_next = null
        var div_show_second = $("#div-show-second")

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
                    'excel', 'pdf', 'print'
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
                url: "{{ route('front.emploies.index') }}",
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

        var show_second = function(form_data) {
            var div_show = $("#div-show-second")
            $.ajax({
                url: "{{ route('front.emploies.index.second') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    console.log(data)
                    if (data.status == true) {
                        div_show.html(data.data.view)
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                        div_show_second.show()
                        initDataTable()
                        initDataTableExport()
                    }
                }
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

        var add = function(form_data) {
            $.ajax({
                url: "{{ route('front.emploies.creat') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        show_second(form_data)
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        var update = function(form_data) {
            $.ajax({
                url: "{{ route('front.emploies.update') }}",
                type: 'POST',
                data: form_data,
                success: function(data) {
                    if (data.status == true) {
                        show_second(form_data)
                        showSuccessMessage()
                    } else {
                        showWarningMessage()
                    }
                }
            })
        }

        var del = function(url) {
            $.ajax({
                url: url,
                success: function(data) {
                    if (data.status == true) {
                        div_show_second.hide()
                        show()
                        //show_second([{name: 'classe_id', value: data.data.classe_id}])
                        showSuccessMessage()
                    } else {
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

        $(document).ready(function() {

            div_show_second.hide()

            show()

            $(document).on("submit", "#form-next", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                show_second(form_data)
            })

            $(document).on("click", "#edit", function(event) {
                event.preventDefault()
                let url = $(this).attr('href')
                edit(url)
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

            $(document).on("submit", "#form-edit", function(event) {
                event.preventDefault()
                form_data = $(this).serializeArray()
                $("#form-edit [data-dismiss='modal']").click()
                update(form_data)
            })
        })
    </script>
@endsection
