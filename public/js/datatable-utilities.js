
/* global _, data, moment, form_utilities, globals */

var datatable_utilities = {
    module_url: window.location.href
};

//<editor-fold defaultstate="collapsed" desc="Renderers">

datatable_utilities.renderDate = function (date, type) {

    // if display or filter data is requested, format the date
    if (type === 'display' || type === 'filter') {
        return (moment(date).format(form_utilities.DISPLAY_DATE_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return date;

};

datatable_utilities.renderTime = function (time, type) {

    // if display or filter data is requested, format the time
    if (type === 'display' || type === 'filter') {
        return (moment(time, form_utilities.SERVER_TIME_FORMAT).format(form_utilities.DISPLAY_TIME_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return time;

};

datatable_utilities.renderTimeFromDateTime = function (time, type) {

    // if display or filter data is requested, format the time
    if (type === 'display' || type === 'filter') {
        return (moment(time, form_utilities.SERVER_DATETIME_FORMAT).format(form_utilities.DISPLAY_TIME_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return time;

};

//</editor-fold>


/**
 * Requires #template-table-inline-actions
 * @param {type} actions
 * @returns {undefined}
 */
datatable_utilities.getInlineActionsView = function (actions) {

    if (!$('#template-table-inline-actions').length) {
        console.error("#template-table-inline-actions not found");
        return "";
    }

    var template = _.template($('#template-table-inline-actions').html());

    return template({actions: actions});

};

datatable_utilities.getAllDefaultActions = function (id) {
    return [
        datatable_utilities.getDefaultViewAction(id),
        datatable_utilities.getDefaultEditAction(id),
        datatable_utilities.getDefaultDeleteAction(id)
    ];
};

datatable_utilities.getDefaultViewAction = function (id) {
    return {
        id: id,
        href: datatable_utilities.module_url + "/" + id,
        name: "view",
        displayName: "View",
        icon: "fa-search"
    };
};

datatable_utilities.getDefaultEditAction = function (id) {
    return {
        id: id,
        href: datatable_utilities.module_url + "/" + id + "/edit",
        name: "edit",
        displayName: "Edit",
        icon: "fa-pencil"
    };
};


datatable_utilities.getDefaultDeleteAction = function (id) {
    return {
        id: id,
        href: datatable_utilities.module_url + "/" + id,
        name: "delete",
        displayName: "Delete",
        icon: "fa-times"
    };
};

//<editor-fold defaultstate="collapsed" desc="Actions">
datatable_utilities.initializeDeleteAction = function () {

    $(document).on('click', '.action-delete', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var url = datatable_utilities.module_url + "/" + id;

        swal({
            title: "Are you sure?",
            text: "This record will be permanently deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!"
        }).then(function () {
            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {
                    console.log(response);
                    swal("Success", "Record deleted", "success");

                    setTimeout(function () {
                        location.reload();
                    }, globals.reloadRedirectWaitTime);

                },
                error: function (response) {
                    console.error(response);
                    swal("Error", response.responseText, "error");
                }
            });
        });
    });


};
//</editor-fold>
