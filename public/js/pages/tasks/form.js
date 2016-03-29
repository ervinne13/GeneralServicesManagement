
/* global id, form_utilities, mode */

(function () {

    var assignedAreaTaskRowTemplate;

    $(document).ready(function () {
        initializeTemplates();
        initializeUI();
        initializeEvents();

        if (mode === "create" || mode === "edit") {
            initializeForm();
        } else {
            form_utilities.disableFieldsOnViewMode(mode);
        }

    });



    function initializeTemplates() {
        assignedAreaTaskRowTemplate = _.template($('#assigned-area-task-row-template').html());
    }

    function initializeUI() {
        $('[name=date_assigned]').datepicker();
        $('[name=from]').timepicker();
        $('[name=to]').timepicker();
    }


    function initializeEvents() {

        $('[name=assigned_to_username]').change(function () {
            var username = $(this).val();

            $.when(getTasksToday(username)).then(
                    function (tasks) {
                        console.log(tasks);
                        utilities.setBoxLoading($('#employee-tasks-table'), false);

                        displayTasks(tasks);
                    },
                    function (xhr) {
                        console.error(xhr);
                        utilities.setBoxLoading($('#employee-tasks-table'), false);
                    }
            );

            utilities.setBoxLoading($('#employee-tasks-table'), true);

        });

    }

    function initializeForm() {
        form_utilities.moduleUrl = "/tasks";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

    function getTasksToday(username) {
        var dfd = $.Deferred();

        var url = baseURL + "/employee/" + username + "/tasksToday";

        $.get(url, function (tasks) {
            dfd.resolve(tasks);
        }).fail(function (xhr) {
            dfd.reject(xhr);
        });

        return dfd.promise();
    }

    function displayTasks(tasks) {
        var html = "";

        for (var i in tasks) {
            html += assignedAreaTaskRowTemplate(tasks[i]);
        }

        $('#employee-tasks-table tbody').html(html);

    }

})();
