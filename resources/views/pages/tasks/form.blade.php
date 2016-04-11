<?php $uses     = ["form-utilities"] ?>

@extends("layouts.lte")

@section('js')

@include('pages.employees.templates')

<script type="text/javascript">
    var id = '{{$task->id}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/tasks/form.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-tasks"></i>
                <h3 class="box-title">Tasks <small>{{$mode}}</small></h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">

                        <form id="task-form" class="form fields-container">
                            <div class="form-group">
                                <label>Employee <span class="text-danger">*</span></label>
                                <select class="form-control" name="assigned_to_username" required>
                                    <option disabled selected>-- Select an Employee --</option>
                                    @foreach($employees AS $employee)
                                    <?php $selected = $task->assigned_to_username == $employee->username ? "selected" : "" ?>
                                    <option data-role-code="{{$employee->role_code}}" value="{{$employee->username}}" {{$selected}}>{{$employee->display_name}}</option>
                                    @endforeach
                                </select>                                    
                            </div>

                            <div class="form-group">
                                <label>Area <span class="text-danger">*</span></label>
                                <select class="form-control" name="area_code" required>
                                    <option disabled selected>-- Select an Area --</option>
                                    @foreach($areas AS $area)
                                    <?php $selected = $task->area_code == $area->code ? "selected" : "" ?>
                                    <option value="{{$area->code}}" {{$selected}}>{{$area->name}}</option>
                                    @endforeach
                                </select>                                    
                            </div>

                            <div class="form-group">
                                <label>Task <span class="text-danger">*</span></label>
                                <select class="form-control" name="task_code" required>
                                    <option disabled selected>-- Select a Task --</option>
                                    @foreach($tasks AS $task)
                                    <?php $selected = $task->task_code == $task->code ? "selected" : "" ?>;
                                    <option data-role-code="{{$task->role_code}}" value="{{$task->code}}" {{$selected}}>{{$task->name}}</option>
                                    @endforeach
                                </select>                                    
                            </div>

                            <div class="form-group">
                                <label>Assignment Date <span class="text-danger">*</span></label>
                                <input type="text" required name="date_assigned" class="form-control required datepicker" value="{{ $task->date_assigned }}" placeholder="xxxx-xx-xx">
                            </div>

                            <div class="form-group">
                                <label>Task Start Time <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="from" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div><!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Task End Time <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="to" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div><!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option disabled selected>-- Select a Status --</option>
                                    @foreach($statusList AS $status)
                                    <?php $selected = $task->status == $status ? "selected" : "" ?>
                                    <option value="{{$status}}" {{$selected}}>{{$status}}</option>
                                    @endforeach
                                </select>                                    
                            </div>

                        </form>

                    </div>
                    <div class="col-md-6">

                        <h4>Assigned Tasks For Today <small>{{date("m/d/y")}}</small></h4>
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
<!--                        <p>TODO: show employee task schedule for the day when selected here</p>

                        <p>TODO: add validation that if the employee is already booked for the selected time, the task won't save</p>

                        <p>TODO: other validations</p>-->

                    </div>

                </div>

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