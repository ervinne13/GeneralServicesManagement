
/* global baseURL, datatable_utilities, baseUrl, utilities */

(function () {

    var showLocationButtonTemplate;
    var equipmentLocationRowTemplate;

    $(document).ready(function () {
        initializeTemplates();
        initializeTable();

        initializeEvents();

    });

    function initializeTemplates() {
        showLocationButtonTemplate = _.template($("#show-location-button-template").html());
        equipmentLocationRowTemplate = _.template($('#equipment-location-row-template').html());
    }

    function initializeTable() {
        $('#equipments-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseURL + "/equipments/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'stock'},
                {data: 'id'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (id) {
//                        var actions = datatable_utilities.getAllDefaultActions(id);
//                        var view = datatable_utilities.getInlineActionsView(actions);
                        return "";
                    }
                },
                {
                    targets: [3],
                    render: function (id, display, equipment) {
                        return showLocationButtonTemplate(equipment);
                    }
                }
            ]
        });

    }

    function initializeEvents() {

        $('#equipments-datatable').on('click', '.action-show-location', function () {
            var id = $(this).data('id');

            $.when(getEquipmentLocations(id)).then(
                    function (locations) {
                        console.log(locations);
                        utilities.setBoxLoading($('#equipment-location-table'), false);

                        displayLocations(locations);
                    },
                    function (xhr) {
                        console.error(xhr);
                        utilities.setBoxLoading($('#equipment-location-table'), false);
                    }
            );

            utilities.setBoxLoading($('#equipment-location-table'), true);

        });

        $('#equipments-datatable').on('click', '.action-delete', function () {

            var id = $(this).data('id');

            swal({
                title: "Are you sure?",
                text: "This equipment, and it's location entries will be deleted! This cannot be reverted",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then(function () {

                let url = baseURL + "/equipments/" + id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function (result) {
                        swal("Deleted!", "Your equipment has been deleted.", "success");

                        setTimeout(function () {
                            window.location.reload();
                        }, globals.reloadRedirectWaitTime);

                    }
                });

            });
        });

    }

    function getEquipmentLocations(id) {
        var dfd = $.Deferred();

        var url = baseURL + "/equipments/" + id + "/locations";

        $.get(url, function (locations) {
            dfd.resolve(locations);
        }).fail(function (xhr) {
            dfd.reject(xhr);
        });

        return dfd.promise();
    }

    function displayLocations(tasks) {
        var html = "";

        for (var i in tasks) {
            html += equipmentLocationRowTemplate(tasks[i]);
        }

        console.log(html);

        $('#equipment-location-table tbody').html(html);

    }

})();
