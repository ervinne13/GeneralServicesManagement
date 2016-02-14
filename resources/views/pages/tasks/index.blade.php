<?php $uses = ["datatables"] ?>

@extends("layouts.lte")

@section("js")

<script src="{{url("js/pages/tasks/index.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-tasks"></i>
                <h3 class="box-title">Tasks</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <a href="{{url("tasks/create")}}" class="btn btn-info btn-flat">
                        <i class="fa fa-plus"></i>
                        Create New                    
                    </a>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-12">
                        <table id="tasks-datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Assigned To</th>
                                    <th>Task</th>
                                    <th>Area</th>
                                    <th>Assignment Date</th>
                                    <th>Time From</th>
                                    <th>Time To</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>

                        <p>TODO: delete, edit</p>

                    </div>
                </div>

            </div>
        </div>   
    </section>
</div>

@endsection