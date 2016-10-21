<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            customer.index.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>

                <div class="panel-body">
                    Customers Page Under Construction!!!
                    <br/>
                    <br/>

                    <table class="table table-striped task-table">
                        <!-- Table Headings -->
                        <thead>
                        <th>Customer</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Customer name</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="customer/update" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="customer/delete" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Customer name</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="customer/update" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="customer/delete" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>Some Customer name</div>
                            </td>

                            <!-- Task Update Button -->
                            <td>
                                <form action="customer/update" method="GET">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-trash">Update</i>
                                    </button>
                                </form>
                            </td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="customer/delete" method="GET">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <form action="customer/add" method="GET">
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