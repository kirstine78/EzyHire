<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            displayUpdateHireRateForm.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Update Hire Rate</h2></div>

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
                    <form action="{{ url('vehicle/update') }}" method="POST" class="form-horizontal">

                        @include('vehicle/vehicleForm')
                        {{--{!! csrf_field() !!}--}}

                        {{--<!-- vehicle rego no -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="editVehicleRegoNo" class="col-sm-3 control-label">Rego no</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="editVehicleRegoNo" id="editVehicleRegoNo" class="form-control" value="{{ $vehicle->fldRegoNo }}" readonly />--}}
                            {{--</div>--}}
                            {{--<input type="hidden" name="edit_vehicle_id" id="edit_vehicle_id" class="form-control" value="{{ $vehicle->id }}">--}}
                        {{--</div>--}}

                        {{--<!-- vehicle brand  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="editVehicleBrand" class="col-sm-3 control-label">Brand</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="editVehicleBrand" id="editVehicleBrand" class="form-control" value="{{ $vehicle->fldBrand }}" readonly />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle seating  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="editVehicleSeating" class="col-sm-3 control-label">Seating</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="editVehicleSeating" id="editVehicleSeating" class="form-control" value="{{ $vehicle->fldSeating }}" readonly />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle hire price -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldHirePriceCurrent" class="col-sm-3 control-label">Current hire price $</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="fldHirePriceCurrent" id="fldHirePriceCurrent" class="form-control" value="{{ $vehicle->fldHirePriceCurrent }}" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle damaged? -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="radEditVehicleDamaged" class="col-sm-3 control-label">Damaged?</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--@if ($vehicle->fldDamaged)--}}
                                    {{--<input type="radio" name="radEditVehicleDamaged" value="1" id="editVehicleDamaged" class="preserveWhiteSpace" checked disabled> Yes<br>--}}
                                    {{--<input type="radio" name="radEditVehicleDamaged" value="0" id="editVehicleNotDamaged" class="preserveWhiteSpace" disabled> No<br>--}}
                                {{--@else--}}
                                    {{--<input type="radio" name="radEditVehicleDamaged" value="1" id="editVehicleDamaged" class="preserveWhiteSpace" disabled> Yes<br>--}}
                                    {{--<input type="radio" name="radEditVehicleDamaged" value="0" id="editVehicleNotDamaged" class="preserveWhiteSpace" checked disabled> No<br>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Update hire price vehicle button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Update Hire Rate</i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection