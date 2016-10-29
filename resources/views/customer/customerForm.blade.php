<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            29.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            customerForm.blade.php
-->

{!! csrf_field() !!}

<!-- customer email -->
<div class="form-group">
    <label for="fldEmail" class="col-sm-2 control-label">Email</label>

    <div class="col-sm-4">
        <input type="email" name="fldEmail" id="fldEmail" class="form-control" value="{{ old('fldEmail', $customer->fldEmail) }}" />
    </div>

    <input type="hidden" name="edit_customer_id" id="edit_customer_id" class="form-control" value="{{ $customer->id }}">

    <div class="col-sm-5">
        @if ($errors->has('fldEmail')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldEmail') }}</div> @endif
    </div>
</div>

<!-- customer first name  -->
<div class="form-group">
    <label for="fldFirstName" class="col-sm-2 control-label">First name</label>

    <div class="col-sm-4">
        <input type="text" name="fldFirstName" id="fldFirstName" class="form-control" value="{{ old('fldFirstName', $customer->fldFirstName) }}"  />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldFirstName')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldFirstName') }}</div> @endif
    </div>
</div>

<!-- customer last name  -->
<div class="form-group">
    <label for="fldLastName" class="col-sm-2 control-label">Last name</label>

    <div class="col-sm-4">
        <input type="text" name="fldLastName" id="fldLastName" class="form-control" value="{{ old('fldLastName', $customer->fldLastName) }}"  />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldLastName')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldLastName') }}</div> @endif
    </div>
</div>

<!-- customer licence number -->
<div class="form-group">
    <label for="fldLicenceNo" class="col-sm-2 control-label">Licence no (9 digits)</label>

    <div class="col-sm-4">
        <input type="text" name="fldLicenceNo" id="fldLicenceNo" class="form-control" maxlength="9"  value="{{ old('fldLicenceNo', $customer->fldLicenceNo) }}" />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldLicenceNo')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldLicenceNo') }}</div> @endif
    </div>
</div>

<!-- customer mobile -->
<div class="form-group">
    <label for="fldMobile" class="col-sm-2 control-label">Mobile (10 digits)</label>

    <div class="col-sm-4">
        <input type="text" name="fldMobile" id="fldMobile" class="form-control" maxlength="10" value="{{ old('fldMobile', $customer->fldMobile) }}" />
    </div>

    <div class="col-sm-5">
        @if ($errors->has('fldMobile')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldMobile') }}</div> @endif
    </div>
</div>

<!-- customer banned? -->
<div class="form-group">
    <label for="radCustomerBanned" class="col-sm-3 control-label">Banned?</label>

    <div class="col-sm-6">
        @if (old('radCustomerBanned')== "1" or $customer->fldBanned)
            <input type="radio" name="radCustomerBanned" value="1" id="customerBanned" class="preserveWhiteSpace" checked> Yes<br>
            <input type="radio" name="radCustomerBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" > No<br>
        @else
            <input type="radio" name="radCustomerBanned" value="1" id="customerBanned" class="preserveWhiteSpace" > Yes<br>
            <input type="radio" name="radCustomerBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" checked> No<br>
        @endif
    </div>
</div>
