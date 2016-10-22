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

                    <form action="vehicle" method="GET" class="marginTopBottom">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add new Vehicle</i>
                        </button>
                    </form>

                    @if (count($vehicles) > 0)

                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th>Rego no</th>
                            <th>Brand</th>
                            <th>Seats</th>
                            <th>Current hire $</th>
                            <th>Damaged</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($vehicles as $vehi)
                                <tr>
                                    <!-- Vehicle rego no -->
                                    <td class="table-text">
                                        <div>{{ $vehi->fldRegoNo }}</div>
                                    </td>

                                    <!-- Vehicle Brand -->
                                    <td class="table-text">
                                        <div>{{ $vehi->fldBrand }}</div>
                                    </td>

                                    <!-- Vehicle Seats -->
                                    <td class="table-text">
                                        <div>{{ $vehi->fldSeating }}</div>
                                    </td>

                                    <!-- Vehicle Current hire $ -->
                                    <td class="table-text">
                                        <div>{{ $vehi->fldHirePriceCurrent }}</div>
                                    </td>

                                    <!-- Vehicle Damaged -->
                                    <td class="table-text">
                                        @if($vehi->fldDamaged)
                                            <div>Yes</div>
                                        @else
                                            <div>No</div>
                                        @endif
                                    </td>

                                    <!-- Vehicle Update Hire Rate Button -->
                                    <td>
                                        <form action="vehicle/{{ $vehi->id }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Vehicle Retire Button -->
                                    <td>
                                        <form action="vehicle/{{ $vehi->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash">Retire</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>There are currently no vehicles in the system</div>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection