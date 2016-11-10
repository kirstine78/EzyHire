<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            archive.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Archive Bookings</h2>Bookings from date (included) and back will be archived.<br/>NB. Unreturned cars will be excluded.</div>

                <div class="panel-body">

                    @if($isArchived)
                        <div class="container">
                            <h4 class="greenMessage">{{ $numberOfRecords }} bookings were archived</h4>


                        </div>
                    @endif

                    <!--  form -->
                    <form action="{{ url('#') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}
                        <!-- date (compare with return date for bookings records in db; and they must have actual return date, cannot be null) -->
                        <div class="form-group">
                            <label for="fldReturnDate" class="col-sm-3 control-label">Pick a Date before today's date *</label>

                            <div class="col-sm-2">
                                <input type="text" name="fldReturnDate" id="fldReturnDate" class="form-control" readonly/>
                            </div>

                            <div class="col-sm-5">
                                @if ($errors->has('fldReturnDate')) <div class="help-block alert alert-danger errRed">{{ $errors->first('fldReturnDate') }}</div> @endif
                            </div>
                        </div>

                        <!-- Add customer button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Archive Bookings</i>
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
        $(document).ready(function() {
            $('#fldReturnDate').dcalendar();
            $('#fldReturnDate').dcalendarpicker({
                format: 'yyyy-mm-dd'
            });
        })
    </script>
@endsection