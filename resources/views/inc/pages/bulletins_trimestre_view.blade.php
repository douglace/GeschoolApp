@extends('../../layout')

@section('title', "Geschool-Année Scolaire")

@section('css')
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100% !important;
            font-size: 24px !important;
        }
        #div-show{
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
                                BULLETINS TRIMESTRE
                            </h2>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"
                            style="display: flex; justify-content: flex-end;">
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
    
@endsection

@section('script')
    <script type="text/javascript">
    
        var show = function () {
            var div_show = $("#div-show")
            $.ajax({
                url: "{{route('front.bulletin_trimestre.index')}}",
                success: function (data) {
                    if (data.status == true) {
                        div_show.html(data.data.view)
                        $.AdminBSB.input.activate()
                        $.AdminBSB.select.activate()
                    }
                }
            })
        }

        $(document).ready(function () {
            
            show()
        })
    </script>
@endsection