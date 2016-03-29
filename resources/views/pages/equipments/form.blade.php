<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

@include('pages.equipments.templates')

<script type="text/javascript">
    var id = '{{$equipment->id}}';
    var mode = '{{$mode}}';
</script>

<script src="{{url("js/pages/equipments/form.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Equipment <small>({{$mode}})</small></h3>              
            </div>
            <div class="box-body">

                <form class="fields-container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Equipment Name <span class="text-danger">*</span></label>
                                <input type="text" required name="name" class="form-control required" value="{{ $equipment->name }}" placeholder="Ex. Broom, Mop, etc.">
                            </div>

                            <div class="form-group">
                                <label>Stock <span class="text-danger">*</span></label>
                                <input type="number" required name="stock" class="form-control required" value="{{ $equipment->stock }}" placeholder="How many of this equipment exist?">
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <h4>Information:</h4>

                            <p>
                                Create any equipment that the system needs to track.
                            </p>

                            <p>
                                The stock is the total count of this equipment throughout the school. Whenever new equipment is added, add to the stock here, conversely, for any items lost, or broken, subtract stocks here to synchronize with the system stock count.
                            </p>
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