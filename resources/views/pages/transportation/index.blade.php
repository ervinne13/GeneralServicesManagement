<?php $uses = ["datatables", "fullcalendar", "daterange-picker"] ?>

@extends("layouts.lte")

@section("js")
<script type="text/javascript">
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
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div>
    </section>
</div>


@endsection