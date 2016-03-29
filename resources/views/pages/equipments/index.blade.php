<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

@include('pages.equipments.modals')
@include('pages.equipments.templates')

<script src="{{url("js/pages/equipments/index.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Equipments</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <a href="{{url("equipments/create")}}" class="btn btn-info btn-flat">
                        <i class="fa fa-plus"></i>
                        Create New                            
                    </a>
                    <button id="action-borrow" class="btn btn-success btn-flat" data-toggle="modal" data-target="#borrow-equipment-modal">
                        Borrow
                    </button>
                    <button id="action-return" class="btn btn-success btn-flat" data-toggle="modal" data-target="#return-equipment-modal">
                        Return
                    </button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-6">
                        <h4>Equipment List</h4>

                        <table id="equipments-datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Equipment</th>
                                    <th>Total Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <h4>Equipment Location Tracking</h4>
                    <div class="col-lg-6">
                        <table id="equipment-location-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Area</th>
                                    <th>Qty</th>                                    
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>   
    </section>
</div>

@endsection