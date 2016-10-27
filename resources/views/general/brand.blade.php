<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            brand.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Brands</h2></div>

                <div class="panel-body">
                    <div class="container paddingRight">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{URL::asset('/img/holden.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </div>
                            <div class="col-sm-3">
                                <h4>Holden</h4>
                                Holden vehicles are designed around you. With the sleek design you can truly express yourself wherever you go, whatever your lifestyle.
                            </div>
                            <div class="col-sm-3">
                                <img src="{{URL::asset('/img/nissan.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </div>
                            <div class="col-sm-3">
                                <h4>Nissan</h4>
                                Designed for you. Let the Nissan take you on adventures around Australia.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{URL::asset('/img/subaru.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </div>
                            <div class="col-sm-3">
                                <h4>Subaru</h4>
                                You can do so much more with a Subaru. Adventure in the outback, unleash on coastal roads, nip around town and breeze to school and back. From SUVs to sporty performers, there’s a Subaru that'll help you do.
                            </div>
                            <div class="col-sm-3">
                                <img src="{{URL::asset('/img/toyota.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </div>
                            <div class="col-sm-3">
                                <h4>Toyota</h4>
                                Designed to suit your lifestyle, the Toyota range is ready for work and for play.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection