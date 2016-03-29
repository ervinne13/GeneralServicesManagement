
<div class="modal fade" id="borrow-equipment-modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Borrow Equipment</h4>
            </div>
            <div class="modal-body">
                <div id="borrow-equipment-container" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Equipment To Borrow <span class="text-danger">*</span></label>
                            <select class="form-control" name="equipment_id">
                                <option value="" selected></option>
                                @foreach($equipments AS $equipment)
                                <option value="{{$equipment->id}}">{{$equipment->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Area <span class="text-danger">*</span></label>
                            <select class="form-control" name="area_code">
                                @foreach($areas AS $area)
                                <option value="{{$area->code}}">{{$area->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Stock Remaining (On Hand)</label>
                            <input type="number" readonly class="form-control remaining-stocks-field">
                        </div>

                        <div class="form-group">
                            <label>Stock Remaining (In Selected Area)</label>
                            <input type="number" readonly class="form-control remaining-on-area-field">
                        </div>

                        <div class="form-group">
                            <label>Qty to Borrow <span class="text-danger">*</span></label>
                            <input type="number" required name="qty" class="form-control required" placeholder="How many of this equipment do you need?">
                        </div>                       

                    </div>

                    <div class="col-md-6">
                        <h3>Information</h3>

                        <p>
                            Fields marked with <span class="text-danger">*</span> are required.
                        </p>

                        <p>
                            Fill up what equipment you want to borrow and where and how many do you need.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default action-button pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="action-borrow-equipment" class="btn btn-primary action-button">Borrow</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="return-equipment-modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Borrow Equipment</h4>
            </div>
            <div class="modal-body">
                <div id="return-equipment-container" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Equipment To Borrow <span class="text-danger">*</span></label>
                            <select class="form-control" name="equipment_id">
                                <option value="" selected></option>
                                @foreach($equipments AS $equipment)
                                <option value="{{$equipment->id}}">{{$equipment->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Area <span class="text-danger">*</span></label>
                            <select class="form-control" name="area_code">
                                @foreach($areas AS $area)
                                <option value="{{$area->code}}">{{$area->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Stock Remaining (On Hand)</label>
                            <input type="number" readonly class="form-control remaining-stocks-field">
                        </div>

                        <div class="form-group">
                            <label>Stock Remaining (In Selected Area)</label>
                            <input type="number" readonly class="form-control remaining-on-area-field">
                        </div>

                        <div class="form-group">
                            <label>Qty to Return <span class="text-danger">*</span></label>
                            <input type="number" required name="qty" class="form-control required" placeholder="How many of this equipment to return?">
                        </div>                       

                    </div>

                    <div class="col-md-6">
                        <h3>Information</h3>

                        <p>
                            Fields marked with <span class="text-danger">*</span> are required.
                        </p>

                        <p>
                            Fill up what equipment you want to borrow and where and how many do you need.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default action-button pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="action-return-equipment" class="btn btn-primary action-button">Return</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
