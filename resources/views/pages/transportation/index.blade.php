<?php $uses = ["datatables", "fullcalendar", "daterange-picker"] ?>

@extends("layouts.lte")

@section("js")

<script src="{{url("vendor/momentjs/moment.js")}}"></script>

<script type="text/javascript">
var events = JSON.parse('{!! $calendarEvents !!}');
var currentUsername = '{{Auth::user()->username}}';
</script>
<script src="{{url("js/pages/transportation/calendar.js")}}"></script>
<script src="{{url("js/pages/transportation/vehicle-list.js")}}"></script>
<script src="{{url("js/pages/transportation/reservation.js")}}"></script>

@endsection

@section("content")

<div class="container">
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#calendar-tab" data-toggle="tab" aria-expanded="true">Calendar</a>
                </li>
                <li class="">
                    <a href="#vehicles-tab" data-toggle="tab" aria-expanded="false">Vehicles</a>
                </li>
                <li>
                    <a href="#reservations-tab" data-toggle="tab">Reservation</a>
                </li>

                <li class="pull-left header"><i class="fa fa-truck"></i> Transportation Module</li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="calendar-tab">
                    <div id="calendar"></div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="vehicles-tab">
                    @include('pages.transportation.vehicle-list')
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="reservations-tab">
                    @include('pages.transportation.reserve')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button id="action-reserve" type="button" class="btn btn-primary action-button">Reserve</button>
                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div>
    </section>
</div>


<div class="modal fade" id="reserved-vehicle-modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Reserved Vehicle</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-5 text-right">Vehicle Make: </label>
                            <p class="col-md-7" id="vehicle-make"></p>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 text-right">Vehicle Model: </label>
                            <p class="col-md-7" id="vehicle-model"></p>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 text-right">Reserved To: </label>
                            <p class="col-md-7" id="reserved-to"></p>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 text-right">Reservation Purpose: </label>
                            <p class="col-md-7" id="purpose"></p>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 text-right">Destination: </label>
                            <p class="col-md-7" id="destination"></p>
                        </div>
                    </div>

                    <!--                    <div class="col-md-4">
                                            <h3>Information</h3>
                    
                                            <p>
                                                If you want to change this reservation, simply click "Edit" below.
                                                The application will redirect you to the edit page of this reservation
                                            </p>                        
                                        </div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default action-button pull-left" data-dismiss="modal">Close</button>
                <a id="link-edit-reservation" type="button" href="javascript:void(0)" class="btn btn-primary action-button">Edit</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection