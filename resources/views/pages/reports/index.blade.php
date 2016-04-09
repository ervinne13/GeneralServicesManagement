<?php $uses = ["datatables"] ?>

@extends("layouts.lte")

@section("js")
<script type="text/javascript">
    var currentUsername = '{{Auth::user()->username}}'
</script>
<script src="{{url("js/pages/reports/index.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-tasks"></i>
                <h3 class="box-title">Reports</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <a href="{{url("reports/create")}}" class="btn btn-info btn-flat">
                        <i class="fa fa-plus"></i>
                        Create New                    
                    </a>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-12">
                        <table id="reports-datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 45px"></th>
                                    <th style="width: 100px">Date</th>
                                    <th style="max-width: 200px">Reported By</th>
                                    <th style="min-width: 450px;">Issue</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>   
    </section>
</div>


@endsection