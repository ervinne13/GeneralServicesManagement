<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

@include('pages.vehicles.templates')

<script type="text/javascript">
    var id = '{{$vehicle->id}}';
    var mode = '{{$mode}}';
</script>

<script src="{{url("js/pages/vehicles/form.js")}}"></script>

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

                <form class="fields-container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Asset Code / Vehicle Identifier <span class="text-danger">*</span></label>
                                <input type="text" required name="asset_code" class="form-control required" value="{{ $vehicle->asset_code }}" placeholder="Ex. Broom, Mop, etc.">
                            </div>

                            <div class="form-group">
                                <label>Make</label>
                                <input type="text" required name="make" class="form-control required" value="{{ $vehicle->make }}" placeholder="How many of this equipment exist?">
                            </div>

                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" required name="model" class="form-control required" value="{{ $vehicle->model }}" placeholder="How many of this equipment exist?">
                            </div>

                            <div class="form-group">
                                <label>Body Style</label>
                                <input type="text" required name="body_style" class="form-control required" value="{{ $vehicle->body_style }}" placeholder="How many of this equipment exist?">
                            </div>

                            <div class="form-group">
                                <label>Capacity (Numeric - Number of Passengers)</label>
                                <input type="number" required name="capacity" class="form-control required" value="{{ $vehicle->capacity }}" placeholder="How many of this equipment exist?">
                            </div>

                        </div>

                        <div class="col-lg-6">

                            
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @include("module.parts.actions")
                        </div>
                    </div>

                </form>

            </div>
        </div>   
    </section>
</div>

@endsection