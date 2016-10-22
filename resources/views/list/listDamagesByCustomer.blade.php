<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            listDamagesByCustomer.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>List Damages by Customer</h2>(Excluding Damages belonging to archived Bookings)</div>

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
                                    <i class="fa fa-plus">Show Damages list</i>
                                </button>
                            </div>
                        </div>

                        @if (count($joinTable) == 0 && $customerIdDropDown != null)
                            <h4>Customer has a clean damage record</h4>
                        @elseif (count($joinTable) > 0)
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th>Date</th>
                                <th>Rego no</th>
                                <th>Brand</th>
                                <th>Damage type</th>
                                <th>Description</th>
                                <th>Fixed</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach($joinTable as $j)
                                    <tr>
                                        <!-- Damage date -->
                                        <td class="table-text">
                                            <div>{{ $j->fldDamageDate }}</div>
                                        </td>

                                        <!-- rego no -->
                                        <td class="table-text">
                                            <div>{{ $j->fldRegoNo }}</div>
                                        </td>

                                        <!-- brand -->
                                        <td class="table-text">
                                            <div>{{ $j->fldBrand }}</div>
                                        </td>

                                        <!-- Damage type -->
                                        <td class="table-text">
                                            <div>{{ $j->fldDamageType }}</div>
                                        </td>

                                        <!-- Damage description -->
                                        <td class="table-text">
                                            <div>{{ $j->fldDamageDescription }}</div>
                                        </td>

                                        <!-- Damage fixed status -->
                                        <td class="table-text">
                                            @if($j->fldFixed)
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