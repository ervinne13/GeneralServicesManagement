
/* global events */

(function () {
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

                    $('#vehicle-make').text(event.make);
                    $('#vehicle-model').text(event.model);
                    $('#purpose').text(event.purpose);
                    $('#destination').text(event.destination_name);
                    $('#reserved-to').text(event.reserve_to);

                    $('#reserved-vehicle-modal').modal('show');

                    $('#link-edit-reservation').attr('href', baseURL + "/vehicle-reservation/" + event.id + "/edit")

                });
            }
        });
    });

})();
