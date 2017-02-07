
    var map="";
	var marker = []; //arrays
    var routes = [];
    var color = "";
    var longitudes = [];
    var latitudes = [];
    var infoWindow = [];
    var polylinePath = "";
    var info= "";


function initMap() {
        var mapOptions = {
          center: new google.maps.LatLng(37.775362, -122.417564),
          zoom: 11,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
		 map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);
            
      };




      function addMarkers() {
        deleteMarkers();
        for(i=0; i<latitudes.length; i=i+1){
              marker[i] = new google.maps.Marker({
              position: new google.maps.LatLng(latitudes[i], longitudes[i]),
              title: "I am a marker!"
          });
          addInfoWindow(marker[i],routes[i]);
        }
      }

      function addInfoWindow(marker,st) {
          infoWindow = new google.maps.InfoWindow({
          });

          google.maps.event.addListener(marker, 'click', function () {
              getInfo(st);
              infoWindow.setContent(info);
              infoWindow.open(map, marker);
          });
      }

      function getInfo(st){
        $.ajax({
          type: "GET",
          data: {st: st},
          async: false,
          url: "../model/info.php",
          success: function(response){
            info=response;
          }
        });
      }
      
      function setAllMap(map) {
        for (var i = 0; i < marker.length; i++) {
          marker[i].setMap(map);
        }
      }
      function clearMarkers() {
        setAllMap(null);
      }
      function showMarkers() {
        setAllMap(map);
      }
      function deleteMarkers() {
        clearMarkers();
        marker = [];
      }

      function addPolyline(r_no) {
          routes.length = 0;
          longitudes.length = 0;
          latitudes.length = 0;
          getRouteXML(r_no);
          getLongitudes(r_no);
          getLatitudes(r_no);

          var polylineCoordinates = [];
          var i;
          for(i=0; i<latitudes.length; i=i+1){
            polylineCoordinates.push(new google.maps.LatLng(latitudes[i], longitudes[i]));
          }
           
          if(polylinePath != "") removeLine();

          polylinePath = new google.maps.Polyline({
            path: polylineCoordinates,
            strokeColor: color,
            strokeOpacity: 1.0,
            strokeWeight: 2
          }); 
          addLine();
    }

    function addLine() {
      polylinePath.setMap(map);
    }

    function removeLine() {
      polylinePath.setMap(null);
    }

    function getRouteXML(r_no) {
        var data = $.ajax({
          type: "GET",
          url: "../model/routes.php?route_no="+r_no,
          async: false,
          success: function(response){
            pushData(response);
          }
        });
      }

    function pushData(response){
        $(response).find('station').each(function(){
        	routes.push($(this).text());
        });
        color=$(response).find('color').text();
    }

    function getLongitudes(r_no){
        $.ajax({
          type: "POST",
          data: {routes: JSON.stringify(routes)},
          async: false,
          url: "../model/longitudes.php",
          success: function(response){
			  longitudes=JSON.parse(response);
          }
        }).done(function(){
			$('.list-group-item').css("background-color", "");
			$( "a[value="+r_no+"]").css("background-color", $("a[value="+r_no+"]").attr("color"));
			
		});
      }

    function getLatitudes(r_no){
        $.ajax({
          type: "POST",
          data: {routes: JSON.stringify(routes)},
          async: false,
          url: "../model/latitudes.php",
          success: function(response){
            latitudes = JSON.parse(response);
          }
        }).done(function(){
			//$( "a[value="+r_no+"]").css("background-color", $("a[value="+r_no+"]").attr("color"));
			
			
		});
      }