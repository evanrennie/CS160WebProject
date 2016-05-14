<?php
  //$store = $_POST['storeID'];
?>

<html>
 <div align="center" position="fixed">
 <font size="6">Please Choose Your Home Store</font></div>
 <div><form action = "mapToStore.php" method = "POST">
 	<input id="storeChoice" type="submit" name="submit" value=" 1406 Fillmore St. San Francisco">
 	<input id="storeChoice" type="submit" name="submit" value=" 520 Tamarack Ln, San Francisco">
 	<input id="storeChoice" type="submit" name="submit" value=" 200 S B St, San Mateo">
 	<input id="storeChoice" type="submit" name="submit" value=" 401 Hillsdale Mall, San Mateo">
 	<input id="storeChoice" type="submit" name="submit" value=" 815 Elmira Dr, Sunnyvale"></form></div>
  <div><form action = "mapToStore.php" method = "POST">
 	<input id="storeChoice" type="submit" name="submit" value=" 97 S San Pedro St, San Jose">
 	<input id="storeChoice" type="submit" name="submit" value=" 1001 Market St, Oakland">
 	<input id="storeChoice" type="submit" name="submit" value=" 2583 Haste St, Berkeley">
 	<input id="storeChoice" type="submit" name="submit" value=" 1690 Detroit Ave, Concord">
 	<input id="storeChoice" type="submit" name="submit" value=" 3636 Walnut Blvd, Brentwood">
 </form> </div>

<!--FORM-->

<div align="center">
  <div id="dvMap" style="width: 1000px; height: 1000px">
</div>
</html>

<style>
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #storeChoice {
        position: relative;
        font-size: 20px;
        left: 5%;
        display: inline-block;
        width: 210px;
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
        "description": 'Please Select 1406 Fillmore St, San Francisco as your default store.'    
    },
    {
       "title": 'San Francisco Branch 2',
        "lat": '37.658130',
        "lng": '-122.415701',
        "description": 'Please Select 520 Tamarack Ln, San Francisco as your default store.'
    },
    {
        "title": 'San Mateo Branch 1',
        "lat": '37.565997',
        "lng": '-122.323287',
        "description": 'Please Select 200 S B St, San Mateo as your default store.'

    },
    {
        "title": 'San Mateo Branch 2',
        "lat": '37.536565',
        "lng": '-122.299216',
        "description": 'Please Select 401 Hillsdale Mall, San Mateo as your default store.'
    },
    {
        "title": 'Santa Clara Branch 1',
        "lat": '37.365741',
        "lng": '-122.042859',
        "description": 'Please Select 815 Elmira Dr, Sunnyvale as your default store.'
    },
    {
         "title": 'Santa Clara Branch 2',
         "lat": '37.333462',
         "lng": '-121.891696',
         "description": 'Please Select 97 S San Pedro St, San Jose as your default store.'
    },
    {
         "title": 'Alameda Branch 1',
         "lat": '37.805924',
         "lng": '-122.282252',
         "description": 'Please Select 1001 Market St, Oakland as your default store.'
    },
    {
         "title": 'Alameda Branch 2',
         "lat": '37.866417',
         "lng": '-122.256563',
         "description": 'Please Select 2583 Haste St, Berkeley as your default store.'
    },
    {
         "title": 'Contra Costa Branch 1',
         "lat": '37.969822',
         "lng": '-122.041222',
         "description": 'Please Select 1690 Detroit Ave, Concord as your default store.'
    },
    {
         "title": 'Contra Costa Branch 2',
         "lat": '37.927046',
         "lng": '-121.695153',
         "description": 'Please Select 3636 Walnut Blvd, Brentwood as your default store.'
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
      document.getElementById("storeID").innerHTML = 'storeChosen';
      //window.localStorage.setItem("storeID", JSON.stringify(storeChosen));
      //document.location.href = "mapToStore.php?name="+storeChosen;
      //document.location.href = "mapToStore.php";
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
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                    storeChosen = data.title;
                    //alert(storeChosen);
                });
            })(marker, data);
        }
    }
</script>

