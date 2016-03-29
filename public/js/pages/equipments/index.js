
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
            showEquipmentLocations(id);
        });

        $('#equipments-datatable').on('click', '.action-delete', function () {
            var id = $(this).data('id');
            deleteEquipment(id);
        });

        $('[name=equipment_id]').change(function () {
            let equipmentId = $(this).val();
            console.log("equipmentId", equipmentId);
            loadRemainingStocks(equipmentId);
        });

        $('#action-borrow-equipment').click(function () {
            try {
                validateEquipmentToBorrow();
                borrowEquipment();
            } catch (e) {
                console.error(e);
                swal("Error", e.message, "error");
            }
        });

        $('#action-return-equipment').click(function () {
            try {
                validateEquipmentToReturn();
                returnEquipment();
            } catch (e) {
                console.error(e);
                swal("Error", e.message, "error");
            }
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

        $('#equipment-location-table tbody').html(html);

    }

    function showEquipmentLocations(id) {
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
    }

    function deleteEquipment(id) {
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
    }

    function loadRemainingStocks(equipmentId) {

        if (loadRemainingStocks) {
            let url = baseURL + "/equipments/" + equipmentId + "/stock-info";
            let params = {
                area: $('[name=area_code]').val()
            };

            $.get(url, params, stockInfo => {
                $('.remaining-stocks-field').val(stockInfo.stocks_on_hand);
                $('.remaining-on-area-field').val(stockInfo.stocks_on_area);
            }).fail(handlerXHRError);
        }
    }

    /**/
    //<editor-fold defaultstate="collapsed" desc="Borrow Functions">    

    function validateEquipmentToBorrow() {

        let equipment = getEquipmentToBorrow();
        let remainingStocks = $('#borrow-equipment-container .remaining-stocks-field').val();

        if (equipment.equipment_id && equipment.area_code && equipment.qty) {
            console.log(remainingStocks + " " + equipment.qty);
            if (parseInt(remainingStocks) >= parseInt(equipment.qty)) {
                return true;
            } else {
                throw new Error("You can only borrow up to " + remainingStocks);
            }
        } else {
            throw new Error("Equipment Id, area code, and qty to borrow are required!`");
        }
    }

    function borrowEquipment() {

        let url = baseURL + "/equipments/borrow";
        let params = getEquipmentToBorrow();

        $.post(url, params, response => {
            $('.action-button').prop('disabled', false);
            console.log(response);
            $('#borrow-equipment-modal').modal('hide');
        }).fail(handlerXHRError);

        $('.action-button').prop('disabled', true);
    }

    function getEquipmentToBorrow() {
        return {
            equipment_id: $('#borrow-equipment-container [name=equipment_id]').val(),
            area_code: $('#borrow-equipment-container [name=area_code]').val(),
            qty: $('#borrow-equipment-container [name=qty]').val(),
        };
    }

    //</editor-fold>

    /**/
    //<editor-fold defaultstate="collapsed" desc="Return Functions">    

    function validateEquipmentToReturn() {

        let equipment = getEquipmentToReturn();
        let remainingStocks = $('#return-equipment-container .remaining-on-area-field').val();

        if (equipment.equipment_id && equipment.area_code && equipment.qty) {
            console.log(remainingStocks + " " + equipment.qty);
            if (parseInt(remainingStocks) >= parseInt(equipment.qty)) {
                return true;
            } else {
                throw new Error("You can only return up to " + remainingStocks);
            }
        } else {
            throw new Error("Equipment Id, area code, and qty to return are required!`");
        }
    }

    function returnEquipment() {

        let url = baseURL + "/equipments/return";
        let params = getEquipmentToReturn();

        console.log(params);

        $.post(url, params, response => {
            $('.action-button').prop('disabled', false);
            console.log(response);
            $('#return-equipment-modal').modal('hide');
        }).fail(handlerXHRError);

        $('.action-button').prop('disabled', true);
    }

    function getEquipmentToReturn() {
        return {
            equipment_id: $('#return-equipment-container [name=equipment_id]').val(),
            area_code: $('#return-equipment-container [name=area_code]').val(),
            qty: $('#return-equipment-container [name=qty]').val()
        };
    }

    //</editor-fold>


    function handlerXHRError(xhr) {
        $('.action-button').prop('disabled', false);
        console.error(xhr);
        swal("Error", "Failed to load remaining stocks: " + xhr.responseText, "error");
    }

})();
