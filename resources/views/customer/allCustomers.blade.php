<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            allCustomers.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Customers</h2></div>

                <div class="panel-body">

                    @if (count($customers) > 0)

                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Licence no</th>
                            <th>Mobile</th>
                            <th>Banned</th>
                            <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($customers as $cust)
                                <tr>
                                    <!-- Customer first Name -->
                                    <td class="table-text">
                                        <div>{{ $cust->fldFirstName }}</div>
                                    </td>

                                    <!-- Customer last Name -->
                                    <td class="table-text">
                                        <div>{{ $cust->fldLastName }}</div>
                                    </td>

                                    <!-- Customer email -->
                                    <td class="table-text">
                                        <div>{{ $cust->fldEmail }}</div>
                                    </td>

                                    <!-- Customer Licence -->
                                    <td class="table-text">
                                        <div>{{ $cust->fldLicenceNo }}</div>
                                    </td>

                                    <!-- Customer Mobile -->
                                    <td class="table-text">
                                        <div>{{ $cust->fldMobile }}</div>
                                    </td>

                                    <!-- Customer banned -->
                                    <td class="table-text">
                                    @if ($cust->fldBanned)
                                        <div>Yes</div>
                                    @else
                                        <div>No</div>
                                    @endif
                                    </td>

                                    <!-- Customer Update Button -->
                                    <td>
                                        <form action="customer/{{ $cust->id }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-btn fa-trash">Update</i>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Customer Delete Button -->
                                    <td>
                                        <form action="customer/{{ $cust->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash">Delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>There are currently no customers in the system</div>

                    @endif

                    <form action="customer" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add new Customer</i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection