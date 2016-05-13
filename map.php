<?php
  //$store = $_POST['storeID'];
?>


<div align="center">
 <font size="6">Please Choose a Nearby Store</font></div>

<!--FORM-->
<form action="mapToStore.php" method="POST">
  <input type="hidden" name="storeID" id="storeID" value="storeID">
</form>

<div align="center">
  <div id="dvMap" style="width: 1400px; height: 1000px">
</div>

<style>
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #floating-panel {
        position: fixed;
        top: 45px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 2px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
</style>
 
<!--
<div id="floating-panel">
      <input onclick="chooseStore();" type=button value="Choose This Store">
</div>
-->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [
    {
        "title": 'San Francisco Branch 1',
        "lat": '37.782423',
        "lng": '-122.432495',
        "description": 'Would you like to select 1406 Fillmore St, San Francisco as your default store?'    
    },
    {
       "title": 'San Francisco Branch 2',
        "lat": '37.658130',
        "lng": '-122.415701',
        "description": 'Would you like to select 520 Tamarack Ln, San Francisco as your default store?'
    },
    {
        "title": 'San Mateo Branch 1',
        "lat": '37.565997',
        "lng": '-122.323287',
        "description": 'Would you like to select 200 S B St, San Mateo as your default store?'

    },
    {
        "title": 'San Mateo Branch 2',
        "lat": '37.536565',
        "lng": '-122.299216',
        "description": 'Would you like to select 401 Hillsdale Mall, San Mateo as your default store?'
    },
    {
        "title": 'Santa Clara Branch 1',
        "lat": '37.365741',
        "lng": '-122.042859',
        "description": 'Would you like to select 815 Elmira Dr, Sunnyvale as your default store?'
    },
    {
         "title": 'Santa Clara Branch 2',
         "lat": '37.333462',
         "lng": '-121.891696',
         "description": 'Would you like to select 97 S San Pedro St, San Jose as your default store?'
    },
    {
         "title": 'Alameda Branch 1',
         "lat": '37.805924',
         "lng": '-122.282252',
         "description": 'Would you like to select 1001 Market St, Oakland as your default store?'
    },
    {
         "title": 'Alameda Branch 2',
         "lat": '37.866417',
         "lng": '-122.256563',
         "description": 'Would you like to select 2583 Haste St, Berkeley as your default store?'
    },
    {
         "title": 'Contra Costa Branch 1',
         "lat": '37.969822',
         "lng": '-122.041222',
         "description": 'Would you like to select 1690 Detroit Ave, Concord as your default store?'
    },
    {
         "title": 'Contra Costa Branch 2',
         "lat": '37.927046',
         "lng": '-121.695153',
         "description": 'Would you like to select 3636 Walnut Blvd, Brentwood as your default store?'
    }
];
    var infoWindow = new google.maps.InfoWindow();
    var storeChosen = 0;
    window.onload = function () {
        LoadMap();
    }

    //Executed after a marker is clicked and the submit button is pressed
    //Updates the form at the top with the correct store ID
    function myFunction() {
    if(storeChosen == 0){
    	window.alert("Please choose a store by clicking a marker.");
    }
    else {
      document.getElementById("storeID").innerHTML = storeChosen;
      window.localStorage.setItem("storeID", JSON.stringify(storeChosen));
      document.location.href = "mapToStore.php";
      //alert(document.getElementById("storeID").innerHTML);
    	//document.location.href = "fruits.html";
    }
}

    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng({lat:37.5042, lng:-122.1059}),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
 
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
 
            //Updates the store ID when the button is pressed.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.close();
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description + "</div>" + '<button onclick="myFunction()">Choose Store</button>');
                    infoWindow.open(map, marker);
                    storeChosen = data.title;
                    //alert(storeChosen);
                });
            })(marker, data);
        }
    }
</script>

