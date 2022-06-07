<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script type="text/javascript">
            function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: { lat: 40.72, lng: -73.96 },
            });
            const geocoder = new google.maps.Geocoder();
            const infowindow = new google.maps.InfoWindow();

            document.getElementById("submit").addEventListener("click", () => {
                geocodePlaceId(geocoder, map, infowindow);
            });
            }

            // This function is called when the user clicks the UI button requesting
            // a geocode of a place ID.
            function geocodePlaceId(geocoder, map, infowindow) {
            const placeId = document.getElementById("place-id").value;

            geocoder
                .geocode({ placeId: placeId })
                .then(({ results }) => {
                if (results[0]) {
                    map.setZoom(11);
                    map.setCenter(results[0].geometry.location);

                    const marker = new google.maps.Marker({
                    map,
                    position: results[0].geometry.location,
                    });

                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                } else {
                    window.alert("No results found");
                }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
            }

            window.initMap = initMap;
        </script>
    </head>
</html>