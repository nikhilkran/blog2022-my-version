<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                var latlng = new google.maps.LatLng(-34.397, 150.644);
                var myOptions = { zoom: 8, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP };
                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
            }); 
        </script>
    </head>
    <body>
        <div id="map_canvas" style="width: 500px; height: 300px; position: relative; background-color: rgb(229, 227, 223);"></div>
    </body>
</html>