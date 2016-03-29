
/* global form_utilities, id, image_utils */

(function () {

    $(document).ready(function () {
        initializeFormUtils();
        form_utilities.disableFieldsOnViewMode(mode);
    });

    function initializeFormUtils() {
        form_utilities.moduleUrl = "/vehicle-reservation";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
        form_utilities.preProcessData = function (reservation) {

            reservation.period_from = moment(selectedStartDate).format('YYYY-MM-DD HH:mm');
            reservation.period_to = moment(selectedEndDate).format('YYYY-MM-DD HH:mm');

            return reservation;
        };
    }


})();
