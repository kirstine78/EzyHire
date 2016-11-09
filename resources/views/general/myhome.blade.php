<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            myhome.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Welcome to EzyHire</h2></div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        Find cheap car hire fast and hit the Australian roads happy with EzyHire.
                        <br/>
                        <br/>
                        Just download EzyHire mobile app and get started.
                        <br/>
                        <br/>
                        You can also call our friendly and helpful staff to make bookings.
                        <br/>
                        Phone: 0112233445
                        <br/>
                    </div>

                    <div class="col-sm-2">
                        <img src="{{URL::asset('/img/car3.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                    </div>

                    <div class="col-sm-2">
                        <img src="{{URL::asset('/img/car2.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                    </div>

                    <div class="col-sm-2">
                        <img src="{{URL::asset('/img/car1.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection