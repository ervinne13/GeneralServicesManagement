<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

<script type="text/javascript">
    var id = '{{$id}}';
    var mode = '{{$mode}}';
</script>

<script src="{{url("js/image-utils.js")}}"></script>
<script src="{{url("js/pages/vehicle-reservation/form.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Vehicle <small>({{$mode}})</small></h3>              
            </div>
            <div class="box-body">

                @include("pages.transportation.reserve")

                <div class="row">
                    <div class="col-md-12">
                        @include("module.parts.actions")
                    </div>
                </div>

            </div>
        </div>   
    </section>
</div>

@endsection