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
        <label for="fldEmail" class="col-sm-3 control-label">Email</label>

        <div class="col-sm-6">
            <input type="email" name="fldEmail" id="fldEmail" class="form-control" value="{{ old('fldEmail', $customer->fldEmail) }}" />
        </div>
        <input type="hidden" name="edit_customer_id" id="edit_customer_id" class="form-control" value="{{ $customer->id }}">
    </div>

    <!-- customer first name  -->
    <div class="form-group">
        <label for="fldFirstName" class="col-sm-3 control-label">First name</label>

        <div class="col-sm-6">
            <input type="text" name="fldFirstName" id="fldFirstName" class="form-control" value="{{ $customer->fldFirstName }}"  />
        </div>
    </div>

    <!-- customer last name  -->
    <div class="form-group">
        <label for="fldLastName" class="col-sm-3 control-label">Last name</label>

        <div class="col-sm-6">
            <input type="text" name="fldLastName" id="fldLastName" class="form-control" value="{{ $customer->fldLastName }}"  />
        </div>
    </div>

    <!-- customer licence number -->
    <div class="form-group">
        <label for="fldLicenceNo" class="col-sm-3 control-label">Licence Number (9 digits)</label>

        <div class="col-sm-6">
            <input type="text" name="fldLicenceNo" id="fldLicenceNo" class="form-control" maxlength="9"  value="{{ $customer->fldLicenceNo }}" />
        </div>
    </div>

    <!-- customer mobile -->
    <div class="form-group">
        <label for="fldMobile" class="col-sm-3 control-label">Mobile (10 digits)</label>

        <div class="col-sm-6">
            <input type="text" name="fldMobile" id="fldMobile" class="form-control" maxlength="10" value="{{ $customer->fldMobile }}" />
        </div>
    </div>

    <!-- customer banned? -->
    <div class="form-group">
        <label for="radCustomerBanned" class="col-sm-3 control-label">Banned?</label>

        <div class="col-sm-6">
            @if ($customer->fldBanned)
                <input type="radio" name="radCustomerBanned" value="1" id="customerBanned" class="preserveWhiteSpace" checked> Yes<br>
                <input type="radio" name="radCustomerBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" > No<br>
            @else
                <input type="radio" name="radCustomerBanned" value="1" id="customerBanned" class="preserveWhiteSpace" > Yes<br>
                <input type="radio" name="radCustomerBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" checked> No<br>
            @endif
        </div>
    </div>

    <!-- Update customer button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-plus">Update Customer</i>
            </button>
        </div>
    </div>
