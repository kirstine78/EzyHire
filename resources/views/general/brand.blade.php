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
                    <table>
                        <tr>
                            <td class="col-sm-3">
                                <img src="{{URL::asset('/img/holden.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </td>
                            <td class="col-sm-3">
                                Foo bar
                            </td>
                            <td class="col-sm-3">
                                <img src="{{URL::asset('/img/nissan.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </td>
                            <td class="col-sm-3">
                                Foo bar
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-3">
                                <img src="{{URL::asset('/img/subaru.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </td>
                            <td class="col-sm-3">
                                Foo bar
                            </td>
                            <td class="col-sm-3">
                                <img src="{{URL::asset('/img/toyota.jpg')}}" alt="car" class="img-responsive marginTopBottom" >
                            </td>
                            <td class="col-sm-3">
                                Foo bar
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection