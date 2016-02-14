
/* global baseURL, datatable_utilities, baseUrl, utilities */

(function () {

    $(document).ready(function () {
        initializeTable();
        datatable_utilities.initializeDeleteAction();
    });


    function initializeTable() {
        $('#reports-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseURL + "/reports/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'id'},
                {data: 'date'},
                {data: 'reported_by.display_name', name: 'reportedBy.display_name'},
                {data: 'issue'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (id, type, rowData) {
                        var actions;
                        if (rowData.issued_by_username == currentUsername) {
                            actions = datatable_utilities.getAllDefaultActions(id);
                        } else {
                            actions = [
                                datatable_utilities.getDefaultViewAction(id)
                            ];
                        }

                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                },
                {
                    targets: 1,
                    render: datatable_utilities.renderDate
                },
                {
                    targets: 3,
                    render: function (issue, type, rowData) {

                        if (issue.length > 65) {
                            var link = '<a href="' + baseURL + "/reports/" + rowData.id + '">Click to view all</a>';
                            return issue.substring(0, 65) + "... " + link;
                        }

                        return issue;
                    }
                }
            ]
        });

    }

})();
