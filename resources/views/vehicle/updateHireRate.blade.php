<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            updateHireRate.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Update Hire Rate</div>

                <div class="panel-body">
                    Update Hire Rate Page Under Construction!!!
                    <br/>
                    <br/>

                    Rego no
                    <br/>
                    <input value="XYZ123" disabled>
                    <br/>
                    <br/>
                    etc.
                    <br/>
                    <input value="blabla" disabled >
                    <br/>
                    <br/>
                    etc.
                    <br/>
                    <input value="blabla" disabled>
                    <br/>
                    <br/>
                    Hire rate
                    <br/>
                    <input value="$90" >
                    <br/>
                    <br/>
                    <br/>
                    <form action="/vehicle" method="GET">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Update</i>
                        </button>
                        (button click will on success redirect to vehicle overview)
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection