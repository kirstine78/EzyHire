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

                    <!--  form -->
                    <form action="{{ url('vehicle/update') }}" method="POST" class="form-horizontal">

                        @include('vehicle/vehicleForm')

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

@section('page-script')
    <script type="text/javascript">
        // set relevant input fields to readonly
        $(".vehicleFormReadOnly").prop('readonly', true);
    </script>
@endsection

