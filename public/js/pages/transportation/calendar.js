
/* global events */

(function () {

    var currentlyDisplayedVehichleInModal;

    $(document).ready(function () {

        events.forEach(event => {
            event.start = new Date(event.start);
            event.end = new Date(event.end);
        });

        $('#calendar').fullCalendar({
            events: events,
            eventRender: function (event, element) {
                element.attr('href', 'javascript:void(0);');
                element.click(function () {
                    console.log(event);

                    currentlyDisplayedVehichleInModal = event

                    $('#vehicle-make').text(event.make);
                    $('#vehicle-model').text(event.model);
                    $('#purpose').text(event.purpose);
                    $('#destination').text(event.destination_name);
                    $('#reserved-to').text(event.reserve_to);

                    $('#period-from').text(moment(new Date(event.period_from)).format("MM/DD/YYYY h:mm A"));
                    $('#period-to').text(moment(new Date(event.period_to)).format("MM/DD/YYYY h:mm A"));

                    $('#reserved-vehicle-modal').modal('show');

                    $('#link-edit-reservation').attr('href', baseURL + "/vehicle-reservation/" + event.id + "/edit")

                });
            }
        });

        initializeEvents();

    });

    function initializeEvents() {
        $('#link-cancel-reservation').click(function () {
            swal({
                title: "Are you sure?",
                text: "This reservation will be canceled",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, cancel it!",
                closeOnConfirm: false
            }).then(function () {
                cancel();
            });
        });
    }

    function cancel() {
        let url = baseURL + "/vehicle-reservation/cancel";
        let params = {
            period_from: currentlyDisplayedVehichleInModal.period_from,
            period_to: currentlyDisplayedVehichleInModal.period_to,
            vehicle_asset_code: currentlyDisplayedVehichleInModal.vehicle_asset_code
        };

        $.post(url, params, response => {
            console.log(response);
            swal("Success", "Reservation cancelled", "success");
            setTimeout(function () {
                window.location.reload();
            }, 3000);
        }).fail(xhr => {
            console.error(xhr);
            swal("Error", xhr.responseText, "error");
        });

    }
})();
