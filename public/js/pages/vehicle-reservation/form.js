
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
    }


})();
