<script type="text/html" id="details-form-create-actions-template">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-cont pull-right">
                <button id="action-save-new-detail" data-id="<%= id %>" type="button" class="btn btn-sm btn-primary btn-flat">
                    Save & New Detail
                </button>
                <button id="action-save-close-detail" data-id="<%= id %>" type="button" class="btn btn-sm btn-success btn-flat">
                    Save & Close Detail
                </button>
                <button id="action-close-detail" type="button" class="btn btn-sm btn-default">
                    Close
                </button>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="details-form-edit-actions-template">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-cont pull-right">
                <button id="action-update-next-detail" data-id="<%= id %>" type="button" class="btn btn-sm btn-primary btn-flat">
                    Update & Next Detail
                </button>
                <button id="action-update-close-detail" data-id="<%= id %>" type="button" class="btn btn-sm btn-success btn-flat">
                    Update & Close Detail
                </button>
                <button id="action-close-detail" type="button" class="btn btn-sm btn-default btn-flat">
                    Close
                </button>
            </div>
        </div>
    </div>
</script>