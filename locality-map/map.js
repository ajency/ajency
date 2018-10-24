var map;
var shapesDrawn = [];
var storePolygonArea = [];
var address = [];
var defaultMarker = [];
var pixel;

function initMap() {
	window.onload = function() {
		var polygonAreaTextbox = document.getElementById('polygon-area');
		var deleteButton =  document.getElementById('delete-button');
		var input = document.getElementById('place-search');
		

		var overlay = new google.maps.OverlayView();
		overlay.draw = function() {};
		overlay.setMap(map);

		getUserLocation();	

		createMarkersFromCsv();


		
		var drawingToolbar = new google.maps.drawing.DrawingManager({
			drawingMode: null,
			drawingControl: true,
			drawingControlOptions: {
			  position: google.maps.ControlPosition.TOP_CENTER,
			  drawingModes: [
			  	google.maps.drawing.OverlayType.POLYGON,
			  ]

			},
			polygonOptions:{
				clickable: true,
				strokeColor: '#f8ce0e',
				fillColor: '#faf104',
				//draggable: true,
			}
		});
		drawingToolbar.setMap(map);

		/*setTimeout(function (){
        	var googleElement = document.getElementsByClassName('gmnoprint')
        	console.log(googleElement);
        	//console.log(googleElement.getElementsByTagName('div'));
					//console.log(document.querySelectorAll([title='Draw a shape']));
				
	    },10000);
*/

		
		
		/*findByAttributeValue('title','Draw a shape');

		function findByAttributeValue(attribute, value){
			var all = document.getElementsByTagName('*');
			console.log(all);
			for(var i=0; i< all.length; i++){
				if(all[i].getAttribute(attribute) == value){
					console.log(all[i]);
				}
			}
		}*/

		/*var hiddenElements = document.getElementsByClassName('show-after-js');
		for(var i = 0; i < hiddenElements.length; i++){
			hiddenElements[i].style.visibility = 'visible';
		}*/
		setTimeout(function (){
			$(".gmnoprint").each(function(){
				
				var newObj = $(this).find("[title='Stop drawing']");
				newObj.attr('id', 'btnStop');
				
				var img = newObj.find("img");
				
				img.attr('src', "http://google-maps-icons.googlecode.com/files/sailboat-tourism.png");
				img.attr('id', 'btnStopImg');
				newObj.parent().parent().attr("id", "btnBar");

				newObj = $(this).find("[title='Draw a shape']");
				newObj.attr('id', 'btnShape');

				img = newObj.find("img");
				img.attr('src', "http://google-maps-icons.googlecode.com/files/sailboat-tourism.png");
				img.attr('id', 'btnShapeImg');
			});

			
		},1000);

		google.maps.event.addListener(drawingToolbar, "overlaycomplete", function(event){
			
			drawingToolbar.setDrawingMode(null);

			
			var vertex = [];
			var shapeLength = event.overlay.getPath().getArray().length;
			for(var i = 0; i < shapeLength; i++){
				vertex.push(new google.maps.LatLng(event.overlay.getPath().getArray()[i].lat(), event.overlay.getPath().getArray()[i].lng()));
			}

			storePolygonArea.push(((google.maps.geometry.spherical.computeArea(vertex)) * 10.7639).toFixed(3)+" " + "Square Feet");
 			polygonAreaTextbox.value = storePolygonArea[storePolygonArea.length - 1];
			
			var newShape = event.overlay;
			newShape.type = event.type;
			shapesDrawn.push(newShape);

			var overlay = new google.maps.OverlayView();
			overlay.draw = function(){};
			overlay.setMap(map);
			
			positionDeleteBtn = {
				lat :event.overlay.getPath().getArray()[shapeLength-1].lat(),
				lng :event.overlay.getPath().getArray()[shapeLength-1].lng()
			};

			var deleteMarker = new google.maps.Marker({
				
				//icon: "http://google-maps-icons.googlecode.com/files/sailboat-tourism.png"
				icon:"System Delete.bmp",
			});

			deleteMarker.setMap(map);
			deleteMarker.setPosition(positionDeleteBtn);


			google.maps.event.addListener(deleteMarker, 'click', function() {

				if(shapesDrawn.length != 0)	{
					shapesDrawn.pop().setMap(null);
					storePolygonArea.pop();
					var polygonAreaTextbox = document.getElementById('polygon-area');
				if(shapesDrawn.length == 0 ){
					polygonAreaTextbox.value = '';
				}
				else{
						polygonAreaTextbox.value = storePolygonArea[storePolygonArea.length - 1];
					}
		/*var deleteBtn = document.getElementById('deleteBtn');
		document.body.removeChild(deleteBtn);*/
		deleteMarker.setMap(null);
				}

			});
			/*var point = overlay.getProjection().fromLatLngToDivPixel;
			console.log(point);*/

			/*google.maps.event.addListener(newShape, 'mouseover', function() {
    			var projection = overlay.getProjection(); 
    			var mLatLng = new google.maps.LatLng(event.overlay.getPath().getArray()[shapeLength-1].lat(), event.overlay.getPath().getArray()[shapeLength-1].lng());
    			pixel = projection.fromLatLngToContainerPixel(mLatLng);
    			
    			return pixel;
			});*/

			/*google.maps.event.addListener(newShape, 'mouseover', function() {
				var projection = overlay.getProjection(); 
    			var mLatLng = new google.maps.LatLng(event.overlay.getPath().getArray()[shapeLength-1].lat(), event.overlay.getPath().getArray()[shapeLength-1].lng());
    			pixel = projection.fromLatLngToContainerPixel(mLatLng);
				var deleteBtn = document.createElement('img');
				deleteBtn.setAttribute('type','onclick');
				deleteBtn.setAttribute('src', "http://google-maps-icons.googlecode.com/files/sailboat-tourism.png");
				deleteBtn.setAttribute('id', 'deleteBtn');
				deleteBtn.setAttribute('onclick','deletePolygon()');
				document.body.appendChild(deleteBtn);
				deleteBtn.style.position = "absolute";

				deleteBtn.style.left = pixel.x+'px';
				deleteBtn.style.top = pixel.y+'px';
			});

			deleteButton.onclick = deletePolygon;
*/
			

			
		});
		

		
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds',map);

		var infowindow = new google.maps.InfoWindow();

		//marker.setOptions({'opacity' : 0.5});

		

		var marker = new google.maps.Marker({
			map : map,
			icon : 'http://google-maps-icons.googlecode.com/files/sailboat-tourism.png',
			anchorPoint : new google.maps.Point(0,-29),
			draggable : true,
			//opacity : 0.5
		});
		
		/*map.addListener('drawingMode_changed', function(){
			console.log("Changed");
		})*/
		autocomplete.addListener('place_changed', function(){
		
			var place = autocomplete.getPlace(place);
			if(!place.geometry){
				window.alert('Geometry not found');
				return;
			}
			if(place.geometry.viewport){
				map.fitBounds(place.geometry.viewport);
			} 
			else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);		
			}
			
			if(defaultMarker != null){
				defaultMarker[0].setMap(null); //to maintain one draggable marker,delete geolocation marker 
			}
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			getGeocodeAddress(marker.getPosition());

			google.maps.event.addListener(marker, 'dragend', function(){
				getGeocodeAddress(marker.getPosition());
			});

		});

	}

}


function getUserLocation () {
	var pos = {};
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			pos = {
				lat : position.coords.latitude,
				lng : position.coords.longitude
			};

			map.setCenter(pos);
			

			var locationMarker = new google.maps.Marker({
				map : map,
				icon: 'http://google-maps-icons.googlecode.com/files/sailboat-tourism.png',
				anchorPoint : new google.maps.Point(0,-29),
				draggable : true
			});
			defaultMarker.push(locationMarker);
			
			locationMarker.setPosition(pos);
			getGeocodeAddress(locationMarker.getPosition());

			google.maps.event.addListener(locationMarker, 'dragend', function(){
				getGeocodeAddress(locationMarker.getPosition());
			});
		});
	}

	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 18
	});
}

function deletePolygon() {
	
	if(shapesDrawn.length != 0){
		shapesDrawn.pop().setMap(null);
		storePolygonArea.pop();
		var polygonAreaTextbox = document.getElementById('polygon-area');
		if(shapesDrawn.length == 0 ){
			polygonAreaTextbox.value = '';
		}
		else{
			polygonAreaTextbox.value = storePolygonArea[storePolygonArea.length - 1];
		}
		/*var deleteBtn = document.getElementById('deleteBtn');
		document.body.removeChild(deleteBtn);*/
		deleteMarker.setMap(null);
	}


}

function getGeocodeAddress(pos) {
	
	var geocoder = new google.maps.Geocoder;
	geocoder.geocode({
		latLng: pos,
	},function(response){
		var markerTextbox = document.getElementById('marker-address');
		markerTextbox.value = response[1].formatted_address;
	});
}

function getGeocodeLatLng(address){

	var geocoder = new google.maps.Geocoder;

	geocoder.geocode({'address':address}, function(results, status){

		if(status ===  google.maps.GeocoderStatus.OK){
			var marker = new google.maps.Marker({
				position: results[0].geometry.location,
				map : map
			});
			console.log(marker.getPosition().lat());
			console.log(marker.getPosition().lng());
		}
		else{
			alert('Geocode Error ' + status);
		}
	});
	
};

function createMarkersFromCsv(){
	$.ajax({
			
			url:"Localities_live.csv",
			async:false,
			success: function(csvdata){

				data = $.csv2Array(csvdata);
			},
			dataType : "text",
			complete: function (){
				
				return data;
			}
	});

		for(var i = 1; i< data.length; i++){
			
			var marker = new google.maps.Marker({
				position : new google.maps.LatLng(data[i][5],data[i][6]),
				map : map
			});

			attachLocality(marker, data[i][7]);
		};


		function attachLocality(marker, localMessage){

			var infowindow = new google.maps.InfoWindow({
				content: localMessage
			});

			marker.addListener('mouseover', function(){
				infowindow.open(marker.get('map'), marker);
			});

			marker.addListener('mouseout', function(){
				infowindow.close(marker.get('map'), marker);
			});
		}
}


  