<?php $uses = ["form-utilities"] ?>

@extends("layouts.lte")

@section('js')

<script type="text/javascript">
    var id = '{{$report->id}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/reports/form.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-tasks"></i>
                <h3 class="box-title">Report <small>{{$mode}}</small></h3>
            </div>
            <div class="box-body">

                <form id="report-form" class="form fields-container">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Reported By (Username) <span class="text-danger">*</span></label>
                                <input type="text" required readonly name="issued_by_username" class="form-control required" value="{{ $report->issued_by_username }}">
                            </div>

                            <div class="form-group">
                                <label>Reported By</label>
                                <input type="text" disabled readonly class="form-control" value="{{ $report->reportedBy->display_name }}">
                            </div>

                            <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input type="text" name="date" readonly class="form-control" value="{{ $report->date }}">                                
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Issue to Report <span class="text-danger">*</span></label>
                                <textarea required class="form-control" name="issue" style="min-height:200px;">{{$report->issue}}</textarea>
                            </div>

                        </div>

                    </div>
                </form>

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