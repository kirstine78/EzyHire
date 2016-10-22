<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            displayAddVehicleForm.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Add Vehicle</h2></div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('vehicle/add') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}

                    <!-- vehicle rego no -->
                        <div class="form-group">
                            <label for="addVehicleRegoNo" class="col-sm-3 control-label">Rego no</label>

                            <div class="col-sm-6">
                                <input type="text" name="addVehicleRegoNo" id="addVehicleRegoNo" class="form-control" maxlength="6"/>
                            </div>
                        </div>

                        <!-- vehicle brand  -->
                        <div class="form-group">
                            <label for="addVehicleBrand" class="col-sm-3 control-label">Brand</label>

                            <div class="col-sm-6">
                                <input type="text" name="addVehicleBrand" id="addVehicleBrand" class="form-control" />
                            </div>
                        </div>

                        <!-- vehicle Seating  -->
                        <div class="form-group">
                            <label for="addVehicleSeating" class="col-sm-3 control-label">Seating</label>

                            <div class="col-sm-6">
                                <input type="text" name="addVehicleSeating" id="addVehicleSeating" class="form-control" />
                            </div>
                        </div>

                        <!-- vehicle hire price current -->
                        <div class="form-group">
                            <label for="addVehicleHirePrice" class="col-sm-3 control-label">Current hire price $</label>

                            <div class="col-sm-6">
                                <input type="text" name="addVehicleHirePrice" id="addVehicleHirePrice" class="form-control"/>
                            </div>
                        </div>

                        <!-- vehicle damaged? -->
                        {{--<div class="form-group">--}}
                            {{--<label for="radBanned" class="col-sm-3 control-label">Banned?</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="radio" name="radBanned" value="1" id="customerBanned">Yes<br>--}}
                                {{--<input type="radio" name="radBanned" value="0" id="customerNotBanned" checked>No<br>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Add vehicle button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Add Vehicle</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection