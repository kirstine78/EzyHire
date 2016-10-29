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
                    <form action="{{ url('vehicle/add') }}" method="POST" class="form-horizontal">

                        @include('vehicle/vehicleForm')

                        {{--{!! csrf_field() !!}--}}

                        {{--<!-- vehicle rego no -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldRegoNo" class="col-sm-3 control-label">Rego no *</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="fldRegoNo" id="fldRegoNo" class="form-control" maxlength="6"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle brand  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldBrand" class="col-sm-3 control-label">Brand *</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="fldBrand" id="fldBrand" class="form-control" maxlength="15"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle Seating  -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldSeating" class="col-sm-3 control-label">Seating *</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="fldSeating" id="fldSeating" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- vehicle hire price current -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="fldHirePriceCurrent" class="col-sm-3 control-label">Current hire price $ *</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="fldHirePriceCurrent" id="fldHirePriceCurrent" class="form-control"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Add vehicle button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
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