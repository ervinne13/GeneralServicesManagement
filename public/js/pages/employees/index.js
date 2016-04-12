
/* global baseURL, datatable_utilities, baseUrl, utilities */

(function () {

    var showAssignedAreaActionTemplate;
    var assignedAreaTaskRowTemplate;

    $(document).ready(function () {
        initializeTemplates();
        initializeTable();

        initializeEvents();        
    });

    function initializeTemplates() {
        showAssignedAreaActionTemplate = _.template($("#show-assigned-area-button-template").html());
        assignedAreaTaskRowTemplate = _.template($('#assigned-area-task-row-template').html());
    }

    function initializeTable() {
        $('#employees-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseURL + "/" + type + "/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'username'},
                {data: 'username'},
                {data: 'display_name'},
                {data: 'username'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {
//                        var actions = datatable_utilities.getAllDefaultActions(code);
//                        var view = datatable_utilities.getInlineActionsView(actions);
                        return "";
                    }
                },
                {
                    targets: [3],
                    render: function (username, display, employee) {
                        employee.type = type;
                        return showAssignedAreaActionTemplate(employee);
                    }
                }
            ]
        });

    }

    function initializeEvents() {

        $('#employees-datatable').on('click', '.action-show-assigned-area', function () {
            var username = $(this).data('username');

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
