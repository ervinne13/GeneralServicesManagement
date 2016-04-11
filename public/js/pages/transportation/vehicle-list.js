

/* global baseURL, datatable_utilities, baseUrl, utilities */

(function () {

    $(document).ready(function () {

        datatable_utilities.module_url = baseURL + "/vehicles"

        initializeTable();
        datatable_utilities.initializeDeleteAction();
    });


    function initializeTable() {
        $('#vehicles-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseURL + "/vehicles/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'asset_code'},
                {data: 'asset_code'},
                {data: 'make'},
                {data: 'model'},
                {data: 'body_style'},
                {data: 'capacity'},
                {data: 'status'},
//                {data: 'image_url'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (assetCode) {
                        var actions = datatable_utilities.getAllDefaultActions(assetCode);
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                },
//                {
//                    targets: 7,
//                    render: function (imageURL) {
//                        return "";
//                    }
//
//                }
            ]
        });

    }

})();

