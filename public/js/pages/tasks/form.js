
/* global id, form_utilities, mode */

(function () {

    $(document).ready(function () {
        initializeUI();

        if (mode === "create" || mode === "edit") {
            initializeForm();
        } else {
            form_utilities.disableFieldsOnViewMode(mode);
        }

    });

    function initializeUI() {
        $('[name=date_assigned]').datepicker();
        $('[name=from]').timepicker();
        $('[name=to]').timepicker();
    }

    function initializeForm() {
        form_utilities.moduleUrl = "/tasks";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();
