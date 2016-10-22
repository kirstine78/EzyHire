<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            allVehicles.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Vehicles</h2></div>

                <div class="panel-body">
                    Vehicles Page Under Construction!!!
                    <br/>
                    <br/>

                    <table class="table table-striped task-table">
                        <!-- Table Headings -->
                        <thead>
                        <th>Vehicle</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Rego no</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="vehicle/rateupdate" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Retire Button -->
                            <td>
                                <form action="vehicle/retire" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Retire</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Rego no</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="vehicle/rateupdate" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Retire Button -->
                            <td>
                                <form action="vehicle/retire" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Retire</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Rego no</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="vehicle/rateupdate" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Retire Button -->
                            <td>
                                <form action="vehicle/retire" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Retire</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Rego no</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="vehicle/rateupdate" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Retire Button -->
                            <td>
                                <form action="vehicle/retire" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Retire</i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <form action="vehicle/add" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add new Vehicle</i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection