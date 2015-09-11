@extends('layouts.register')

@section('scripts')
<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script>
var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 18,
  center: new google.maps.LatLng(-7.9578542,112.5890962),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});
var marker;
google.maps.event.addListener(map, 'click', function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

	if (marker) {
		marker.setMap(null);
	}
	
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        map: map
    });

    // Center of map
    map.panTo(new google.maps.LatLng(lat,lng));
	
	$('#lat').val(lat);
	$('#lng').val(lng);
    $('#locText').text("Latitude=" + lat + " :: Longitude=" + lng);
});
</script>
@endsection

@section('sub-content')		

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">
	
		<div id="panel-2" class="panel panel-primary">
			<div class="panel-heading">
				<a href="{{ url('/step-1') }}" class="btn btn-primary pull-left" >Previous</a>
				Select your business' location on the google map
				<a href="{{ url('/step-3') }}" class="btn btn-primary pull-right" >Next</a>
			</div>
			<div class="panel-body">
				<input id="lat" type="hidden" name="latitude" required="">
				<input id="lng" type="hidden" name="longitude" required="">
				<p id="locText">---</p>
				<div id="map"></div>
			</div>
		</div>
	
	</div>
</div>
<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div class="lol-group btn-group-lg btn-group" role="group">
		  <a href="{{ url('/step-1') }}" class="btn btn-default">1. Business</a>
		  <a href="{{ url('/step-2') }}" class="active btn btn-default">2. Geolocation</a>
		  <a href="{{ url('/step-3') }}" class="btn btn-default">3. Account</a>
		  <a href="{{ url('/step-4') }}" class="btn btn-default">4. Plans</a>
		</div>

	</div>
</div>
@endsection