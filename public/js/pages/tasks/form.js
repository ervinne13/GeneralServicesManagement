
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
//        $('[name=from]').timepicker();
//        $('[name=to]').timepicker();

        $('[name=from]').timepicker({'timeFormat': 'h:i A'});
        $('[name=to]').timepicker({'timeFormat': 'h:i A'});

    }


    function initializeEvents() {

        $('[name=assigned_to_username]').change(function () {
            var username = $(this).val();
            let roleCode = $(this).find('option:selected').data('role-code');

            filterAvailableTasks(roleCode);

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

    function filterAvailableTasks(roleCode) {

        $('[name=task_code] option').each(function () {
            let optionRoleCode = $(this).data('role-code');
            if (roleCode != optionRoleCode) {
                $(this).hide();
            } else {
                $(this).show();
            }
//            $(this).prop('disabled', roleCode != optionRoleCode);
        });

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
