@extends('layouts.admin')

@section('heading', 'Create New Shop')

@section('scripts')
<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script>
$(function() {
});
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

@section('styles')
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
	
		<div class="ibox float-e-margins">
            <div class="ibox-title">
				<h5>Please fill this form</h5>
			</div>
            <div class="ibox-content">
			
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.shops.postCreate') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop name</label>
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop owner's name</label>
						<div class="col-sm-10">
							<input type="text" name="owner" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop address</label>
						<div class="col-sm-10">
							<input type="text" name="address" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop location</label>
						<div class="col-sm-10">
							<input id="lat" type="hidden" name="latitude" required="">
							<input id="lng" type="hidden" name="longitude" required="">
							<p id="locText">---</p>
							<div id="map"></div>
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button type="submit" class="btn btn-primary block full-width m-b">Create</button>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-danger block full-width m-b" href="{{ route('admin.shops.index') }}">Cancel</a>
						</div>
					</div>
				</form>
			
			</div>
		</div>
		
	</div>
</div>

@endsection