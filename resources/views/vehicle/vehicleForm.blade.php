<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            29.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            vehicleForm.blade.php
-->

{!! csrf_field() !!}

<!-- vehicle rego no -->
<div class="form-group">
    <label for="editVehicleRegoNo" class="col-sm-2 control-label">Rego no</label>

    <div class="col-sm-4">
        <input type="text" name="editVehicleRegoNo" id="editVehicleRegoNo" class="form-control" value="{{ $vehicle->fldRegoNo }}" readonly />
    </div>
    <input type="hidden" name="edit_vehicle_id" id="edit_vehicle_id" class="form-control" value="{{ $vehicle->id }}">
</div>

<!-- vehicle brand  -->
<div class="form-group">
    <label for="editVehicleBrand" class="col-sm-2 control-label">Brand</label>

    <div class="col-sm-4">
        <input type="text" name="editVehicleBrand" id="editVehicleBrand" class="form-control" value="{{ $vehicle->fldBrand }}" readonly />
    </div>
</div>

<!-- vehicle seating  -->
<div class="form-group">
    <label for="editVehicleSeating" class="col-sm-2 control-label">Seating</label>

    <div class="col-sm-4">
        <input type="text" name="editVehicleSeating" id="editVehicleSeating" class="form-control" value="{{ $vehicle->fldSeating }}" readonly />
    </div>
</div>

<!-- vehicle hire price -->
<div class="form-group">
    <label for="fldHirePriceCurrent" class="col-sm-2 control-label">Current hire price $</label>

    <div class="col-sm-4">
        <input type="text" name="fldHirePriceCurrent" id="fldHirePriceCurrent" class="form-control" value="{{ old('fldHirePriceCurrent', $vehicle->fldHirePriceCurrent) }}" />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldHirePriceCurrent')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldHirePriceCurrent') }}</div> @endif
    </div>
</div>

<!-- vehicle damaged? -->
<div class="form-group">
    <label for="radEditVehicleDamaged" class="col-sm-2 control-label">Damaged?</label>

    <div class="col-sm-4">
        @if ($vehicle->fldDamaged)
            <input type="radio" name="radEditVehicleDamaged" value="1" id="editVehicleDamaged" class="preserveWhiteSpace" checked disabled> Yes<br>
            <input type="radio" name="radEditVehicleDamaged" value="0" id="editVehicleNotDamaged" class="preserveWhiteSpace" disabled> No<br>
        @else
            <input type="radio" name="radEditVehicleDamaged" value="1" id="editVehicleDamaged" class="preserveWhiteSpace" disabled> Yes<br>
            <input type="radio" name="radEditVehicleDamaged" value="0" id="editVehicleNotDamaged" class="preserveWhiteSpace" checked disabled> No<br>
        @endif
    </div>
</div>