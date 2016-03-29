<form id="report-form" class="form fields-container">

    <div class="row">
        <div class="col-md-6">

            <h4>Reservation</h4>

            <div class="form-group">
                <label>Reservation Date  <span class="text-danger">*</span>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right active" id="reservationtTime">
                </div>
            </div>

            <div class="form-group">
                <label>Vehicle <span class="text-danger">*</span></label>
                <select class="form-control" name="vehicle_asset_code" required>
                    <option disabled selected>-- Select a Vehicle --</option>
                    @foreach($vehicles AS $vehicle)
                    <?php $selected = $reservation->vehicle_asset_code == $vehicle->asset_code ? "selected" : "" ?>
                    <option value="{{$vehicle->asset_code}}" {{$selected}}>({{$vehicle->asset_code}}) {{$vehicle->model}}</option>
                    @endforeach
                </select>                                    
            </div>

            <div class="form-group">
                <label>Driver <span class="text-danger">*</span></label>
                <select class="form-control" name="driver_id" required>
                    <option disabled selected>-- Select a Driver --</option>
                    @foreach($drivers AS $driver)
                    <?php $selected = $reservation->driver_id == $driver->id ? "selected" : "" ?>
                    <option value="{{$driver->id}}" {{$selected}}>{{$driver->display_name}}</option>
                    @endforeach
                </select>                                    
            </div>

            <div class="form-group">
                <label>Reservee / Reserved To <span class="text-danger">*</span></label>
                <input type="text" required name="reserve_to" class="form-control required" value="{{ $reservation->reserve_to }}">
            </div>

            <div class="form-group">
                <label>Contact <span class="text-danger">*</span></label>
                <input type="text" required name="contact" class="form-control required" value="{{ $reservation->contact }}">
            </div>

            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" required name="email" class="form-control required" value="{{ $reservation->email }}">
            </div>

        </div>
        <div class="col-md-6">

            <h4>Desination</h4>

            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" required name="destination_name" class="form-control required" value="{{ $reservation->destination_name }}">
            </div>

            <div class="form-group">
                <label>Address <span class="text-danger">*</span></label>
                <textarea name="destination_address" class="form-control required">{{ $reservation->destination_address }}</textarea>
            </div>

            <div class="form-group">
                <label>Purpose <span class="text-danger">*</span></label>
                <textarea name="purpose" class="form-control required">{{ $reservation->purpose }}</textarea>
            </div>

        </div>

    </div>
</form>
