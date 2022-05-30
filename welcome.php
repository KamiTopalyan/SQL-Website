<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 100%; padding: 20px; text-align: center;}
        h2{font-size: 50px;}
        p{font-size: 45px;}
    </style>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="wrapper">
        <h2 id="ip"></h2>
        <h2 id="reg"></h2>
        <h2 id="post"></h2>
        <h2 id="count"></h2>
        <h2 id="long"></h2>
        <h2 id="lalt"></h2>
        <h2 id="vpn"></h2>
        <td>
    <input id="addressinput" type="text" style="width: 447px" />   
</td>
<td>
    <input id="Button1" type="button" value="Find" onclick="return Button1_onclick()" /></td>
</tr>
        <div id ="map" style="height: 253px" >
        </div>
        <p><a href="logout.php">Logout here.</a></p>
        </form>
    </div>    

    <script>

$.getJSON("https://ipgeolocation.abstractapi.com/v1/?api_key=0166de3cc4ef4f72b50d6c79f8224e4f", function(data) {
    document.getElementById("ip").innerHTML = "IP: " + data.ip_address;
    document.getElementById("reg").innerHTML = "Region: " + data.region;
    document.getElementById("post").innerHTML = "Postal Code: " + data.postal_code;
    document.getElementById("count").innerHTML = "Country: " + data.country;
    document.getElementById("long").innerHTML = "Longitude: " + data.longitude;
    document.getElementById("lalt").innerHTML = "Latitude: " + data.latitude;
    document.getElementById("vpn").innerHTML = "VPN: " + data.security.is_vpn;
})
    var map;
    var geocoder;
    function InitializeMap() {

        var latlng = new google.maps.LatLng(data.longitude, data.lalitude);
        var myOptions =
        {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
    }

    function FindLocaiton() {
        geocoder = new google.maps.Geocoder();
        InitializeMap();

        var address = document.getElementById("addressinput").value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

            }
            else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });

    }33

    function Button1_onclick() {
        FindLocaiton();
    }

    window.onload = InitializeMap;

  </script>

</body>
</html>
