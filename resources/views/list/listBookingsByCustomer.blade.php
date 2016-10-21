<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            listBookingsByCustomer.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>List Bookings by Customer</h2></div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('#') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}

                    <!-- DROP DOWN containing all Customers (deleted excluded) -->
                        <div class="form-group">
                            <label for="id" class="col-sm-3 control-label">Customer ~ Licence no</label>
                            <div class="col-sm-6">
                                <select name="customer_id">
                                    @foreach($customers as $c)
                                        <option value='{{ $c->id }}'>{{ $c->fldFirstName }}{{ " " }}{{ $c->fldLastName }}{{ " ~ " }}{{ $c->fldLicenceNo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if (count($joinTable) > 0)
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th>Pick up </th>
                                <th>Return</th>
                                <th>Actual drop off</th>
                                <th>Rego no</th>
                                <th>Brand</th>
                                <th>Hire $</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach($joinTable as $j)
                                        <tr>
                                            <!-- Booking pick up date -->
                                            <td class="table-text">
                                                <div>{{ $j->fldStartDate }}</div>
                                            </td>

                                            <!-- Booking drop off date -->
                                            <td class="table-text">
                                                <div>{{ $j->fldReturnDate }}</div>
                                            </td>

                                            <!-- Booking actual drop off date -->
                                            <td class="table-text">
                                                <div>{{ $j->fldActualReturnDate }}</div>
                                            </td>

                                            <!-- Booking car rego no -->
                                            <td class="table-text">
                                                <div>{{ $j->fldRegoNo }}</div>
                                            </td>

                                            <!-- Booking car brand -->
                                            <td class="table-text">
                                                <div>{{ $j->fldBrand }}</div>
                                            </td>

                                            <!-- Booking hire -->
                                            <td class="table-text">
                                                <div>{{ $j->fldHirePricePerDay }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif


                        {{--<!-- Rego no -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="movie-title" class="col-sm-3 control-label">Movie title</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="title" id="movie-title" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- brand -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="hire_price" class="col-sm-3 control-label">Hire price</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" name="hire_price" id="hire_price" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Pick up date -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="quantity" class="col-sm-3 control-label">Quantity</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" name="quantity" id="quantity" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Drop off-->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="quantity" class="col-sm-3 control-label">Quantity</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" name="quantity" id="quantity" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Actual drop off-->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="quantity" class="col-sm-3 control-label">Quantity</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" name="quantity" id="quantity" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Indication of Damage -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="quantity" class="col-sm-3 control-label">Quantity</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" name="quantity" id="quantity" class="form-control" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}

                            {{--<div >--}}
                                {{--<input type="text" name="currentDateTime" class="form-control" value="{{ $dateTimeNow  }}" />--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Add movie button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Show Bookings list</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    {{--List Bookings by Customer Page Under Construction!!!--}}

                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--A scrollable drop down list with all customer names shall appear here...--}}
                    {{--<br/>--}}
                    {{--<br/>--}}

                    {{--<button type="submit" class="btn btn-success">--}}
                        {{--<i class="fa fa-btn fa-trash">Show list</i>--}}
                    {{--</button>--}}
                    {{--(button click will show list of bookings below)--}}
                </div>
            </div>
        </div>
    </div>

@endsection