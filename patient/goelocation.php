<?php
session_start();

if(!isset($_SESSION['patient'])){
    header('location:signin.php');
}
else{
    $patient = $_SESSION['patient'];
    //appointment
    include '../connection.php';
    $apSELECT = "SELECT *FROM appointments where patient = '$patient'";
    $apQUERY = mysqli_query($connection, $apSELECT);
   

    //user
    $SELECT = "SELECT *FROM patient where email = '$patient'";
    $QUERY = mysqli_query($connection, $SELECT);
    $res = mysqli_fetch_assoc($QUERY);

    function convert($date):string{

        $new_date = date("d F, Y", strtotime($date));
    
       return $new_date;
    }
}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/geolocation.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Patient | locate hostipals near you</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWMEq95AKx4GeUBiy1rnHDpEy7drCMaWo&libraries=places"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
            <div class="patient">
                <div class="image">
                    <img src="../images/avatar.png" alt="pateint">
                </div>
                <h3><?php echo $res['firstname'] ?></h3>
            </div>

            <div class="menu">
                <a href="dashboard.php"><div class="menu-item ">My Health</div></a>
                <a href="diagnosis.php"><div class="menu-item">Diagnoses</div></a>
                <a href="appointments.php"><div class="menu-item">Appointments</div></a>
                <a href="goelocation.php"><div class="menu-item current" class="menu-item">Find hospitals</div></a>
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
       <h1>Hospitals Near You</h1> <b><?php echo convert(date('d-m-Y'))?></b>
       </div>

      

      <div id="map"></div>
        
       

    </div>
    <script>
        var map;
        var userLocation;
        var directionsService;
        var directionsDisplay;

        function initMap() {
            directionsService = new google.maps.DirectionsService();
            directionsDisplay = new google.maps.DirectionsRenderer();

            // Get user's location
            navigator.geolocation.getCurrentPosition(function(position) {
                userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    center: userLocation,
                    zoom: 14
                });

                directionsDisplay.setMap(map);

                var userMarker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Your Location"
                });

                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                    location: userLocation,
                    radius: 5000, // Search radius in meters
                    type: ['hospital']
                }, function(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            createMarker(results[i]);
                        }
                    }
                });
            });
        }

        function createMarker(place) {
            var marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: place.name
            });

            marker.addListener('click', function() {
                calculateAndDisplayRoute(userLocation, place.geometry.location);
            });
        }

        function calculateAndDisplayRoute(start, end) {
            directionsService.route({
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWMEq95AKx4GeUBiy1rnHDpEy7drCMaWo&callback=initMap"></script>
</body>
</html>