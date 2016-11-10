<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            displayAddVehicleForm.blade.php
-->

@extends('myapp')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Add Vehicle</h2></div>

                <div class="panel-body">

                    <!--  form -->
                    <form action="{{ url('vehicle') }}" method="POST" class="form-horizontal">
                        {{ method_field('PUT') }}

                        @include('vehicle/vehicleForm')

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

@section('page-script')
    <script type="text/javascript">
        {{-- hide damaged radio buttons --}}
        $("#fullDivRadioGroup").hide();

    </script>
@endsection