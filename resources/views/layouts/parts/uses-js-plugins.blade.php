@if (!empty($uses))

@foreach($uses AS $use)

<!--Plugin Dependencies-->
@if (in_array($use, ["datatables", "datetime-picker", "form-utilities", "daterange-picker"]))
<script src="{{url("vendor/momentjs/moment.js")}}"></script>
@endif

@if(in_array($use, ["datatables", "form-utilities"]))
<!--Form utilities is dependent on jquery validate-->
<!--TODO-->
<script src="{{url("vendor/jquery-validation/jquery.validate.js")}}"></script>
<script src="{{url("js/form-utilities.js")}}"></script>

@endif

<!--=========================================-->
<!--Datatables-->
@if($use == "datatables")
<script src="{{lte_plugin("datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{lte_plugin("datatables/dataTables.bootstrap.min.js")}}"></script>

<script src="{{url("js/datatable-utilities.js")}}"></script>

@include('templates.table-inline-actions')

<!--=========================================-->
<!--Auto Numeric-->
@elseif($use == "auto-numeric")
<script src="{{url("vendor/autoNumeric/autoNumeric.js")}}"></script>

<!--=========================================-->
<!--Calendar-->
@elseif($use == "fullcalendar")
<script src="{{lte_plugin("fullcalendar/fullcalendar.min.js")}}"></script>

<!--=========================================-->
<!--Date Range Picker-->
@elseif($use == "daterange-picker")
<script src="{{lte_plugin("daterangepicker/daterangepicker.js")}}"></script>


@endif

@endforeach

@endif