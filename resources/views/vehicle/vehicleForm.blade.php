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
    <label for="fldRegoNo" class="col-sm-2 control-label">Rego no *</label>

    <div class="col-sm-4">
        <input type="text" name="fldRegoNo" id="fldRegoNo" class="form-control vehicleFormReadOnly" value="{{ old('fldRegoNo', $vehicle->fldRegoNo) }}"  />
    </div>
    <input type="hidden" name="edit_vehicle_id" id="edit_vehicle_id" class="form-control" value="{{ $vehicle->id }}">

    <div class="col-sm-5">
        @if ($errors->has('fldRegoNo')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldRegoNo') }}</div> @endif
    </div>
</div>

<!-- vehicle brand  -->
<div class="form-group">
    <label for="fldBrand" class="col-sm-2 control-label">Brand *</label>

    <div class="col-sm-4">
        <input type="text" name="fldBrand" id="fldBrand" class="form-control vehicleFormReadOnly" maxlength="15" value="{{ old('fldBrand', $vehicle->fldBrand) }}"  />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldBrand')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldBrand') }}</div> @endif
    </div>
</div>

<!-- vehicle seating  -->
<div class="form-group">
    <label for="fldSeating" class="col-sm-2 control-label">Seating (1 - 20) *</label>

    <div class="col-sm-4">
        <input type="text" name="fldSeating" id="fldSeating" class="form-control vehicleFormReadOnly" maxlength="2" value="{{ old('fldSeating', $vehicle->fldSeating) }}"  />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldSeating')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldSeating') }}</div> @endif
    </div>
</div>

<!-- vehicle hire price -->
<div class="form-group">
    <label for="fldHirePriceCurrent" class="col-sm-2 control-label">Hire $ (max 9999.99) *</label>

    <div class="col-sm-4">
        <input type="text" name="fldHirePriceCurrent" id="fldHirePriceCurrent" class="form-control" value="{{ old('fldHirePriceCurrent', $vehicle->fldHirePriceCurrent) }}" />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldHirePriceCurrent')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldHirePriceCurrent') }}</div> @endif
    </div>
</div>

<!-- is vehicle damaged? only show for update hire rate, not show when add vehicle -->
<div class="form-group" id="fullDivRadioGroup">
    <label for="radEditVehicleDamaged" class="col-sm-2 control-label">Damaged?</label>

    <div class="col-sm-4">
        @if ($vehicle->fldDamaged)
        {{--@if (old('radVehicleDamaged', $vehicle->fldDamaged))--}}
            <input type="radio" name="radVehicleDamaged" value="1" id="vehicleDamaged" class="preserveWhiteSpace" checked disabled> Yes<br>
            <input type="radio" name="radVehicleDamaged" value="0" id="vehicleNotDamaged" class="preserveWhiteSpace" disabled > No<br>
        @else
            <input type="radio" name="radVehicleDamaged" value="1" id="vehicleDamaged" class="preserveWhiteSpace" disabled > Yes<br>
            <input type="radio" name="radVehicleDamaged" value="0" id="vehicleNotDamaged" class="preserveWhiteSpace" checked disabled > No<br>
        @endif
    </div>
</div>