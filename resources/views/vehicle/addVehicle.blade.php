<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            addVehicle.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Add Vehicle</div>

                <div class="panel-body">
                    Add Vehicle Page Under Construction!!!
                    <br/>
                    <br/>

                    Rego no
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    etc.
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    etc.
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    Hire rate
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    <br/>
                    <form action="/vehicle" method="GET">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add</i>
                        </button>
                        (button click will on success redirect to vehicle overview)
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection