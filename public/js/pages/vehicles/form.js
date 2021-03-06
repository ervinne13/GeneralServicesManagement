
/* global form_utilities, id, image_utils */

(function () {

    $(document).ready(function () {
        initializeFormUtils();
        image_utils.initialize($('#input-vehicle-image'), $('[name=image_url]'), null);

        form_utilities.disableFieldsOnViewMode(mode);

    });

    function initializeFormUtils() {
        form_utilities.moduleUrl = "/vehicles";
        form_utilities.updateObjectId = assetCode;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }


})();
