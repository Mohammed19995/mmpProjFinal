<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .loader {
            margin-top: 200px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

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
    </style>
</head>
<body>

<?php
session()->put('currLoc', 1);
?>
<div align="center">
    <div class="loader"></div>
</div>

<script src="{{asset('mmp/js/jquery-1.11.3.min.js')}}"></script>
<script>

    $(document).ready(function () {

        var currLat;
        var currLng;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                currLat = position.coords.latitude;
                currLng = position.coords.longitude;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('addCurrLoc')}}",
                    method: "get",
                    data: {currLat: currLat, currLng: currLng},
                    success: function (e) {
                        window.location = "{{url('mosque')}}";
                    }

                });
            }, function () {

            });

        } else {
            alert("Browser doesn't support Geolocation");

        }

    });

</script>
</body>
</html>
