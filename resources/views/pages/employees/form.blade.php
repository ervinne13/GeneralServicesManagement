<?php $uses = ["datatables"]; ?>

@extends("layouts.lte")

@section("js")

@include('pages.employees.templates')

<script type="text/javascript">
    var username = '{{$employee->username}}';
    var mode = '{{$mode}}';
    var type = '{{$type}}';
</script>

<script type="text/html" id="password-fields-template">
    <div class="form-group">
        <label>Password</label>
        <input type="password" required name="password" class="form-control" placeholder="Temporary password of the user">
    </div>

    <div class="form-group">
        <label>Repeat Password</label>
        <input type="password" required name="password_repeat" class="form-control" placeholder="Retype password">
    </div>
</script>

<script src="{{url("js/pages/employees/form.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Employee / User <small>({{$mode}})</small></h3>              
            </div>
            <div class="box-body">

                <form class="fields-container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Employee Username <span class="text-danger">*</span></label>
                                <input type="text" required name="username" class="form-control required" value="{{ $employee->username }}">
                            </div>

                            <div class="form-group">
                                <label>Display Name <span class="text-danger">*</span></label>
                                <input type="text" required name="display_name" class="form-control required" value="{{ $employee->display_name }}">
                            </div>

                            <div id="password-fields-container">
                                <button id="action-show-passwords-field" type="button" class="btn btn-link">Change Password</button>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <h4>Information:</h4>

                            <p>
                                Created employees may login to the system to view tasks assigned to them.
                            </p>

                            <p>
                                Assign any temporary password and let the employee login to his account to change his/her password later.
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