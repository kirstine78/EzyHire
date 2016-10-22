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
                <div class="panel-heading"><h2>List Bookings by Customer</h2>(Excluding archived Bookings)</div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('#') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}

                    <!-- DROP DOWN containing all Customers (deleted excluded) -->
                        <div class="form-group">
                            <label for="id" class="col-sm-3 control-label">Customer ~ Licence no</label>
                            <div class="col-sm-4">
                                <select name="customer_id">
                                    @foreach($customers as $c)
                                        @if($c->id == $customerIdDropDown)
                                            <option value='{{ $c->id }}' selected>{{ $c->fldFirstName }}{{ " " }}{{ $c->fldLastName }}{{ " ~ " }}{{ $c->fldLicenceNo }}</option>
                                        @else
                                            <option value='{{ $c->id }}'>{{ $c->fldFirstName }}{{ " " }}{{ $c->fldLastName }}{{ " ~ " }}{{ $c->fldLicenceNo }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <!-- Add Bookings button -->
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Show Bookings list</i>
                                </button>
                            </div>
                        </div>

                        @if (count($joinTable) == 0 && $customerIdDropDown != null)
                            <h4>Customer currently has no bookings</h4>
                        @elseif (count($joinTable) > 0)
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th>Pick up </th>
                                <th>Return</th>
                                <th>Actual drop off</th>
                                <th>Rego no</th>
                                <th>Brand</th>
                                <th>Hire $</th>
                                <th>Damage</th>
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

                                        <!-- Booking damage? -->
                                        <td class="table-text">
                                            @if($j->fldDamageType != null)
                                                <div>Yes</div>
                                            @else
                                                <div>No</div>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection