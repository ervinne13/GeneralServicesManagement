
/* global baseURL, datatable_utilities, baseUrl, utilities */

(function () {

    $(document).ready(function () {
        initializeTable();
        datatable_utilities.initializeDeleteAction();
    });


    function initializeTable() {
        $('#tasks-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseURL + "/tasks/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'id'},
//                {data: 'assignedTo.display_name', name: 'assigned_to.display_name'},
                {data: 'assigned_to_username'},
                {data: 'task_code'},
                {data: 'area_code'},
                {data: 'date_assigned'},
                {data: 'from'},
                {data: 'to'},
                {data: 'status'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {
                        var actions = datatable_utilities.getAllDefaultActions(code);
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                }
            ]
        });

    }

})();
