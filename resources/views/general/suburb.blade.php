<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            suburb.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Suburbs</h2></div>

                <div class="panel-body">
                    <div id="map"></div>
                    <script>

                        function initMap() {

                            var locations = [
                                ['Chadstone', -37.882780, 145.078588, 1],
                                ['Hawthorn', -37.828327, 145.031732, 2],
                                ['Melbourne CBD', -37.813435, 144.957481, 3]
                            ];

                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 10,
                                center: new google.maps.LatLng(-37.840030, 145.009671),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_hMOQizVHR3YV_waanWsD_tcS_vV-6BE&callback=initMap">
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection