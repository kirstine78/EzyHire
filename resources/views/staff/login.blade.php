<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            login.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    Login Page Under Construction!!!
                    <br/>
                    <br/>

                    Try 1 of 3
                    <br/>
                    <br/>

                    Email (username)
                    <br/>
                    <input >
                    <br/>
                    <br/>
                    Password
                    <br/>
                    <input >
                    <br/>
                    <br/>

                    <form action="/customer" method="GET">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Login</i>
                        </button>
                        (button click will on success redirect to Customer page)
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection