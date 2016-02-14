
/* global id, form_utilities, mode */

(function () {

    $(document).ready(function () {
        initializeForm();
        form_utilities.disableFieldsOnViewMode(mode);
    });


    function initializeForm() {
        form_utilities.moduleUrl = "/reports";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();
