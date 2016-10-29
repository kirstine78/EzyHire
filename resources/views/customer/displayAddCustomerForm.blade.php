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

                    {{--@if (count($errors) > 0)--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--<ul>--}}
                                {{--@foreach ($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    <!--  form -->
                    <form action="{{ url('customer/add') }}" method="POST" class="form-horizontal">

                        @include('customer/customerForm')
                    {{--{!! csrf_field() !!}--}}

                        {{--<!-- customer email -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldEmail" class="col-sm-3 control-label">Email</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--<input type="email" name="fldEmail" id="fldEmail" class="form-control" value="{{ old('fldEmail') }}" />--}}
                            {{--</div>--}}

                            {{--<div class="col-sm-3">--}}
                                {{--@if ($errors->has('fldEmail')) <p class="help-block alert alert-danger">{{ $errors->first('fldEmail') }}</p> @endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- customer first name  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldFirstName" class="col-sm-3 control-label">First name (min 2 characters)</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--<input type="text" name="fldFirstName" id="fldFirstName" class="form-control" value="{{ old('fldFirstName') }}" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- customer last name  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldLastName" class="col-sm-3 control-label">Last name (min 2 characters)</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--<input type="text" name="fldLastName" id="fldLastName" class="form-control" value="{{ old('fldLastName') }}" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- customer licence number -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldLicenceNo" class="col-sm-3 control-label">Licence Number (9 digits)</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--<input type="text" name="fldLicenceNo" id="fldLicenceNo" class="form-control" maxlength="9" value="{{ old('fldLicenceNo') }}"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- customer mobile -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldMobile" class="col-sm-3 control-label">Mobile (10 digits)</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--<input type="text" name="fldMobile" id="fldMobile" class="form-control" maxlength="10" value="{{ old('fldMobile') }}"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- customer banned? -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="radBanned" class="col-sm-3 control-label">Banned?</label>--}}

                            {{--<div class="col-sm-4">--}}
                                {{--@if(old('radBanned')== "1")--}}
                                    {{--<input type="radio" name="radBanned" value="1" id="customerBanned" class="preserveWhiteSpace" checked> Yes<br>--}}
                                    {{--<input type="radio" name="radBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" > No<br>--}}
                                {{--@else--}}
                                    {{--<input type="radio" name="radBanned" value="1" id="customerBanned" class="preserveWhiteSpace" > Yes<br>--}}
                                    {{--<input type="radio" name="radBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" checked> No<br>--}}
                                {{--@endif--}}
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