<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

<script type="text/javascript">
    var assetCode = '{{$vehicle->asset_code}}';
    var mode = '{{$mode}}';
</script>

<script src="{{url("js/image-utils.js")}}"></script>
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

                            @if ($mode == "VIEW")
                            <img src="{{ $vehicle->image_url  ? URL::to('/') . $vehicle->image_url : "" }}" width="250px" height="250px" id="image-preview">        
                            @else
                            <div id="image-preview-container" class="form-group">
                                <label for="input-vehicle-image">Profile Image</label>
                                <input type="file" id="input-vehicle-image" name="image">
                                <p class="help-block">Ideal size is 250px x 250px</p>

                                <img src="{{ $vehicle->image_url  ? URL::to('/') . $vehicle->image_url : "" }}" width="250px" height="250px" id="image-preview">
                                <input type="hidden" name="image_url">
                            </div>
                            @endif

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