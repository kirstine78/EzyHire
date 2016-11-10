<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            allCustomers.blade.php
-->

@extends('myapp')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Customers</h2></div>

                <div class="panel-body">
                    <form action="customer" method="GET" class="marginTopBottom">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add new Customer</i>
                        </button>
                    </form>

                    @if (count($customers) > 0)

                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name..">

                        <table class="table table-striped task-table" id="myTable">
                            <!-- Table Headings -->
                            <thead>
                            <th>Name</th>
                            {{--<th>Last name</th>--}}
                            <th>Email</th>
                            <th>Licence no</th>
                            <th>Mobile</th>
                            <th>Banned</th>
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

                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myConfirmModal" ><i class="fa fa-btn fa-trash">Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div id="myConfirmModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirm Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete Customer?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnConfirmYes" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @else
                        <div>There are currently no customers in the system</div>
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
                    if ($(td).first().text().toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // handle when modal shows
        $('#myConfirmModal').on('show.bs.modal', function (e) {
            // on show confirm dialog modal, select the event's related button ("delete" btn in form) that got clicked.
            var btnForm = $(e.relatedTarget);

            // when click yes on dialog box
            $('#btnConfirmYes').on("click", function () {

                // the parent called 'form' has the correct customer id
                btnForm.parent('form').submit();
            });
        });

    </script>
@endsection