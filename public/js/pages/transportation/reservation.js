
/* global form_utilities */

(function () {

    var selectedStartDate = new Date();
    var selectedEndDate = new Date();

    $(document).ready(function () {

        console.log(selectedStartDate);

        initializeUI();
        initializeEvents();
    });

    function initializeUI() {
        $('#reservationtTime').daterangepicker({}, (start, end) => {
            selectedStartDate = start;
            selectedEndDate = end;

            console.log(selectedStartDate + " " + selectedEndDate);

        });
    }

    function initializeEvents() {
        $('#action-reserve').click(function () {
            swal({
                title: "Are you sure?",
                text: "This vehicle will be reserved for use:  " + $('#reservationtTime').val(),
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, reserve it!",
                closeOnConfirm: false
            }).then(function () {
                reserve();
            });
        });
    }

    function reserve() {
        let url = baseURL + "/vehicle-reservation";
        let reservation = form_utilities.formToJSON($('#report-form'));

        reservation.period_from = moment(selectedStartDate).format('YYYY-MM-DD');
        reservation.period_to = moment(selectedEndDate).format('YYYY-MM-DD');

        $.post(url, reservation, response => {

            console.log(response);

            let vehicleName = $('[name=vehicle_reservation_code] option:selected').text();
            swal("Reserved!", vehicleName + " is now reserved", "success");

//            setTimeout(function () {
//                window.location.reload();
//            }, globals.reloadRedirectWaitTime);
        }).fail(xhr => {
            console.error(xhr);
            swal("Error", xhr.responseText, "error");
        });
    }

})();
