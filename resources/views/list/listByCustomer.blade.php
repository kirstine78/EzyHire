<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            listByCustomer.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>List Bookings or Damages by Customer</h2>(Bookings are excluding archived Bookings)<br/>(Damages are excluding Damages belonging to archived Bookings)</div>

                <div class="panel-body">
                    @if ($customerIdSelected == null)

                        @if (count($customers) > 0)

                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name..">

                            <table class="table table-striped task-table" id="myTable">
                                <!-- Table Headings -->
                                <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Licence no</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach($customers as $cust)
                                    <tr>
                                        <!-- Customer Name -->
                                        <td class="table-text">
                                            <div>{{ $cust->fldFirstName }}{{" "}}{{ $cust->fldLastName }}</div>

                                        </td>

                                        <!-- Customer email -->
                                        <td class="table-text">
                                            <div>{{ $cust->fldEmail }}</div>
                                        </td>

                                        <!-- Customer Licence -->
                                        <td class="table-text">
                                            <div>{{ $cust->fldLicenceNo }}</div>
                                        </td>

                                        <!-- Show Bookings list button -->
                                        <td>
                                            <form action="list/bookings" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-trash">Show bookings list</i>
                                                </button>
                                                <input name="customer_id" type="hidden" value="{{ $cust->id }}">
                                            </form>
                                        </td>

                                        <!-- Show Damages list button -->
                                        <td>
                                            <form action="list/damages" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-trash">Show damages list</i>
                                                </button>
                                                <input name="customer_id" type="hidden" value="{{ $cust->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div>There are currently no customers in the system</div>
                        @endif
                    @endif


                    @if ($joinTable != null)
                        @if (count($joinTable) == 0 && $customerIdSelected != null)
                            <h4>Customer currently has no bookings</h4>
                            <form action="/list" method="GET">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-trash">Search again</i>
                                </button>
                            </form>
                        @elseif (count($joinTable) > 0)
                            <h4>Showing bookings for <strong>{{ $joinTable[0]->fldFirstName }}{{ " " }}{{ $joinTable[0]->fldLastName }}{{ " ~ licence no " }}{{ $joinTable[0]->fldLicenceNo }}</strong></h4>

                            <form action="/list" method="GET">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-trash">Search again</i>
                                </button>
                            </form>

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
                    @endif


                    @if ($joinTableDamages != null)
                        @if (count($joinTableDamages) == 0 && $customerIdSelected != null)
                            <h4>Customer has a clean damage record</h4>
                            <form action="/list" method="GET">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-trash">Search again</i>
                                </button>
                            </form>
                        @elseif (count($joinTableDamages) > 0)
                            <h4>Showing damages for <strong>{{ $joinTableDamages[0]->fldFirstName }}{{ " " }}{{ $joinTableDamages[0]->fldLastName }}{{ " ~ licence no " }}{{ $joinTableDamages[0]->fldLicenceNo }}</strong></h4>

                            <form action="/list" method="GET">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-trash">Search again</i>
                                </button>
                            </form>
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th>Date</th>
                                <th>Rego no</th>
                                <th>Brand</th>
                                <th>Damage type</th>
                                <th>Description</th>
                                <th>Fixed</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach($joinTableDamages as $j)
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
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection