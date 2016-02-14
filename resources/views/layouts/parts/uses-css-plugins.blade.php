@if (!empty($uses))

@foreach($uses AS $use)

@if($use == "datatables")
<link href="{{lte_plugin("datatables/dataTables.bootstrap.css")}}" rel="stylesheet">
@elseif($use == "fullcalendar")
<link href="{{lte_plugin("fullcalendar/fullcalendar.min.css")}}" rel="stylesheet">
@elseif($use == "daterange-picker")
<link href="{{lte_plugin("daterangepicker/daterangepicker.css")}}" rel="stylesheet">
@endif

@endforeach

@endif