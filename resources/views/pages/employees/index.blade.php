<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

@include('pages.employees.templates')

<script src="{{url("js/pages/employees/index.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Employees</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <a href="{{url("employees/create")}}" class="btn btn-info btn-flat">
                        <i class="fa fa-plus"></i>
                        Create New                            
                    </a>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-6">
                        <h4>Employee List</h4>

                        <table id="employees-datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>System Username</th>
                                    <th>Display Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <h4>Assigned Area For Today <small>{{date("m/d/y")}}</small></h4>
                    <div class="col-lg-6">
                        <table id="employee-tasks-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Area</th>
                                    <th>Task</th>
                                    <th>Time</th>                                    
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12">
                    <p>TODO: view, delete, edit</p>
                </div>
            </div>
        </div>   
    </section>
</div>

@endsection