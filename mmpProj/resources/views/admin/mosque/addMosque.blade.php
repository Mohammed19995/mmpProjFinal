@extends('admin.app')
@section('css')
    <style>

        .hand {
            cursor: pointer;
        }
        section {
            padding: 20px;
        }

        .form-control-label {
            font-size: 15px;
            font-weight: bold;
        }

        section.forms form span {
            color: #ffffff;
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:after {
            background-color: rgba(253, 41, 59, 0.82);
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:hover {
            background-color: rgba(255, 36, 56, 0.82);
        }

        .bootstrap-tagsinput .badge {
            background-color: rgba(59, 53, 253, 0.82);
            margin: 3px;
        }

        .hidden {
            display: none;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .bd-example-modal-lg .modal-dialog {
            display: table;
            position: relative;
            margin: 0 auto;
            top: calc(30% - 24px);

        }

        .bd-example-modal-lg .modal-dialog .modal-content {
            background-color: transparent;
            border: none;

        }

        #map {
            height: 400px;
            width: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }

    </style>
@endsection
@section('content')


    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Add Mosque</h2>
        </div>
    </header>

    <div class="container">
        <!-- Forms Section-->

        <section class="forms">
            <div class="container-fluid">
                <div class="row">

                    <!-- Form Elements -->
                    <div class="col-sm-1"></div>
                    <div class="col-lg-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add Mosque</h3>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                                    <ul></ul>
                                </div>

                                <div class="successMsg alert alert-success hidden">
                                    The adding is done
                                </div>
                                <!-- <form class="form-horizontal"> -->
                                <form method="post" id="addBookForm" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group row">

                                        {{ csrf_field() }}
                                        <label class="col-sm-2 form-control-label ">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nameBook" name="nameBook" class="form-control">
                                        </div>

                                    </div>
                                    <div class="line"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label ">Country</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="nameBook" name="nameBook" class="form-control">
                                        </div>

                                        <label class="col-sm-1 form-control-label ">City</label>
                                        <div class="col-sm-3">
                                            <input type="text" id="nameBook" name="nameBook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="line"></div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label ">Street</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nameBook" name="nameBook" class="form-control">
                                        </div>

                                    </div>
                                    <div class="line"></div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label">Image </label>
                                        <div class="col-sm-8">
                                            <input name="fileImg" id="fileImg" type="file" accept="image/*"
                                                   class="form-control">
                                        </div>


                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label ">Latitude</label>
                                        <div class="col-sm-3">
                                            <input type="text" id="lat" name="nameBook" class="form-control">
                                        </div>

                                        <label class="col-sm-2 form-control-label ">Longitude</label>
                                        <div class="col-sm-3">
                                            <input type="text" id="lng" name="nameBook" class="form-control">
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="custom-control custom-radio hand">
                                                <input id="radio1" name="radio" type="radio"
                                                       class="custom-control-input" checked>
                                                <span class="custom-control-indicator"></span>
                                                <h5>current location</h5>
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="custom-control custom-radio hand">
                                                <input id="radio2" name="radio"  type="radio"
                                                       class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <h5>determine location</h5>
                                            </label>
                                        </div>
                                    </div>
                                    <input id="pac-input" class="controls form-control" style="padding: 5px;"
                                           type="text" placeholder="Search Box">
                                    <div id="map"></div>


                                    <div class="line"></div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="button" class="btn btn-primary addNewBook">Add mosque
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>


                </div>
            </div>
        </section>

        <!-- Page Footer-->
    </div>

@endsection


@section('script')

    <script>
        var map;
        var marker1;
        var marker2;
        var lat1;
        var lng1;
        var lat2;
        var lng2;

        var currPosition;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(pos);
                    var infoWin = new google.maps.InfoWindow();

                    lat1 = position.coords.latitude;
                    lng1 = position.coords.longitude;

                    marker1 = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: {lat: position.coords.latitude, lng: position.coords.longitude}
                    });

                    marker1.addListener('click', function (evt) {
                        // alert(this.position);
                        // alert(evt.latLng.lat());
                        //  alert(evt.latLng.lng());
                        infoWin.setContent('<h4>AAAAAA</h4>');
                        infoWin.open(map, marker1);
                        // infoWinMap.open(map , marker);
                    });


                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }


            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }

                var bounds = new google.maps.LatLngBounds();

                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    if (marker2 != null) {
                        marker2.setMap(null);
                    }
                    //
                    // Create a marker for each place.
                    marker2 = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        title: place.name,
                        icon: 'http://www.googlemapsmarkers.com/v1/009900/',
                        position: place.geometry.location
                    });

                    lat2 = place.geometry.location.lat();
                    lng2 = place.geometry.location.lng();

                    document.getElementById('lat').value = lat2;
                    document.getElementById('lng').value = lng2;

                    // calculateAndDisplayRoute(directionsService, directionsDisplay , latCurr , lngCurr ,lat2 , lng2 );

                    var infoWindow = new google.maps.InfoWindow();

                    marker2.addListener('click', function (evt) {
                        infoWindow.setContent('<h4>' +
                            evt.latLng.lat() +
                            ' , ' +
                            evt.latLng.lng() +
                            '</h4>');
                        infoWindow.open(map, marker2);

                    });

                    google.maps.event.addListener(marker2, 'dragend', function (event) {
                        document.getElementById("lat").value = event.latLng.lat();
                        document.getElementById("lng").value = event.latLng.lng();
                        // infoWindow.open(map, marker3);
                        lat2 = event.latLng.lat();
                        lng2 = event.latLng.lng();
                    });


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        /*
        document.getElementById('getD').addEventListener('click', function () {
            alert(getDisatnce(lat1, lng1, lat2, lng2)/1000);
        });
*/
        var rad = function (x) {
            return x * Math.PI / 180;
        };

        function getDisatnce(lat1, lng1, lat2, lng2) {
            var R = 6378137; // Earth’s mean radius in meter
            var dLat = rad(lat2 - lat1);
            var dLong = rad(lng2 - lng1);
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(rad(lat1)) * Math.cos(rad(lat2)) *
                Math.sin(dLong / 2) * Math.sin(dLong / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            return d; // returns the distance in meter
        };


        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }


    </script>

    <script>
        $(document).ready(function () {

        });

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBZMoQ-GX3fBlc1bv7DQFdlwbQp9IWoRw&libraries=places&callback=initMap">
    </script>
@endsection