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

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            {{--@foreach ($errors->get('fldEmail') as $message)--}}
                                {{--<li>{{ $message }}</li>--}}
                            {{--@endforeach--}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('customer/add') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}

                        <!-- customer email -->
                        <div class="form-group">
                            <label for="fldEmail" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-4">
                                <input type="email" name="fldEmail" id="fldEmail" class="form-control" />
                            </div>
                        </div>

                        <!-- customer first name  -->
                        <div class="form-group">
                            <label for="fldFirstName" class="col-sm-3 control-label">First name (min 2 characters)</label>

                            <div class="col-sm-6">
                                <input type="text" name="fldFirstName" id="fldFirstName" class="form-control" />
                            </div>
                        </div>

                        <!-- customer last name  -->
                        <div class="form-group">
                            <label for="fldLastName" class="col-sm-3 control-label">Last name (min 2 characters)</label>

                            <div class="col-sm-6">
                                <input type="text" name="fldLastName" id="fldLastName" class="form-control" />
                            </div>
                        </div>

                        <!-- customer licence number -->
                        <div class="form-group">
                            <label for="fldLicenceNo" class="col-sm-3 control-label">Licence Number (9 digits)</label>

                            <div class="col-sm-6">
                                <input type="text" name="fldLicenceNo" id="fldLicenceNo" class="form-control" maxlength="9"/>
                            </div>
                        </div>

                        <!-- customer mobile -->
                        <div class="form-group">
                            <label for="fldMobile" class="col-sm-3 control-label">Mobile (10 digits)</label>

                            <div class="col-sm-6">
                                <input type="text" name="fldMobile" id="fldMobile" class="form-control" maxlength="10"/>
                            </div>
                        </div>

                        <!-- customer banned? -->
                        <div class="form-group">
                            <label for="radBanned" class="col-sm-3 control-label">Banned?</label>

                            <div class="col-sm-6">
                                <input type="radio" name="radBanned" value="1" id="customerBanned" class="preserveWhiteSpace"  > Yes<br>
                                <input type="radio" name="radBanned" value="0" id="customerNotBanned" class="preserveWhiteSpace" checked> No<br>
                            </div>
                        </div>

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