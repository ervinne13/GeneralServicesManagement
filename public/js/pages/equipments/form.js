
/* global form_utilities, id */

(function () {

    $(document).ready(function () {
        initializeFormUtils();
    });

    function initializeFormUtils() {
        form_utilities.moduleUrl = "/equipments";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }


})();
