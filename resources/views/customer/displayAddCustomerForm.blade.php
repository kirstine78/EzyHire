<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            displayAddCustomerForm.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Add Customer</h2></div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('customer/add') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}

                        <!-- customer email -->
                        <div class="form-group">
                            <label for="addCustomerEmail" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="email" name="addCustomerEmail" id="addCustomerEmail" class="form-control" />
                            </div>
                        </div>

                        <!-- customer first name  -->
                        <div class="form-group">
                            <label for="addCustomerFirstName" class="col-sm-3 control-label">First name</label>

                            <div class="col-sm-6">
                                <input type="text" name="addCustomerFirstName" id="addCustomerFirstName" class="form-control" />
                            </div>
                        </div>

                        <!-- customer last name  -->
                        <div class="form-group">
                            <label for="addCustomerLastName" class="col-sm-3 control-label">Last name</label>

                            <div class="col-sm-6">
                                <input type="text" name="addCustomerLastName" id="addCustomerLastName" class="form-control" />
                            </div>
                        </div>

                        <!-- customer licence number -->
                        <div class="form-group">
                            <label for="addCustomerLicenceNo" class="col-sm-3 control-label">Licence Number (9 digits)</label>

                            <div class="col-sm-6">
                                <input type="text" name="addCustomerLicenceNo" id="addCustomerLicenceNo" class="form-control" maxlength="9"/>
                            </div>
                        </div>

                        <!-- customer mobile -->
                        <div class="form-group">
                            <label for="addCustomerMobile" class="col-sm-3 control-label">Mobile (10 digits)</label>

                            <div class="col-sm-6">
                                <input type="text" name="addCustomerMobile" id="addCustomerMobile" class="form-control" maxlength="10"/>
                            </div>
                        </div>

                        <!-- customer banned? -->
                        <div class="form-group">
                            <label for="radBanned" class="col-sm-3 control-label">Banned?</label>

                            <div class="col-sm-6">
                                <input type="radio" name="radBanned" value="1" id="customerBanned">Yes<br>
                                <input type="radio" name="radBanned" value="0" id="customerNotBanned" checked>No<br>
                            </div>
                        </div>

                        <!-- customer deleted? -->
                        {{--<div class="form-group">--}}
                            {{--<label for="radDeleted" class="col-sm-3 control-label">Deleted?</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="radio" name="radDeleted" value="1" id="customerDeleted">Yes<br>--}}
                                {{--<input type="radio" name="radDeleted" value="0" id="customerNotDeleted" checked>No<br>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Add customer button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Add Customer</i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection