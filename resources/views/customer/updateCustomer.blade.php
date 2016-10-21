<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            updateCustomer.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Update Customer</div>

                <div class="panel-body">
                    Update Customer Page Under Construction!!!
                    <br/>
                    <br/>

                    Name
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    Licence
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
                    <br/>

                    <form action="/customer" method="GET">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash">Update</i>
                        </button>
                        (button click will on success redirect to customer overview)
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection