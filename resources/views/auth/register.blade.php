@extends('layouts.public')

@section('title', 'Register')

@section('scripts')
<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script>
$(function() {
	
	var panel1 = $('#panel-1');
	var panel2 = $('#panel-2');
	var panel3 = $('#panel-3');
	var panel4 = $('#panel-4');
	
	var currentPanel = panel1;
	
	panel2.hide();
	panel3.hide();
	panel4.hide();
	
	$('#btn-1').click(function() {
		currentPanel.hide();
		panel1.fadeIn();
		currentPanel = panel1;
	});
	
	$('#btn-2').click(function() {
		currentPanel.hide();
		panel2.fadeIn();
		currentPanel = panel2;
	});
	
	$('#btn-3').click(function() {
		currentPanel.hide();
		panel3.fadeIn();
		currentPanel = panel3;
	});
	
	$('#btn-4').click(function() {
		currentPanel.hide();
		panel4.fadeIn();
		currentPanel = panel4;
	});
	
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
.hr-strong {
	border-color: #777;
}
.hr-half {
	width: 250px;
}
.fullheight {
	height: 1000px;
}
.bg-green {
	background-color: #A0C3BC;
}
h1 {
	color: #1ab394;
}
.lol-group {
	margin: 30px;
}
.panel-primary .panel-heading {
	background-color: #1ab394;
}
</style>
@endsection

@section('content')
<section id="services" class="fullheight services bg-green">
	<div class="container">
		<div class="row text-center">
		
			<div class="col-lg-12">
				<h1>Great! So you're a business owner</h1>
				<h2>Lets make your product known</h2>
			</div>
			
		</div>
		
		<div class="row text-center">
			<div class="col-lg-8 col-lg-offset-2">
		
				<div class="lol-group btn-group-lg btn-group" role="group" aria-label="...">
				  <button id="btn-1" type="button" class="btn btn-default">1. Business</button>
				  <button id="btn-2" type="button" class="btn btn-default">2. Geolocation</button>
				  <button id="btn-3" type="button" class="btn btn-default">3. Account</button>
				  <button id="btn-4" type="button" class="btn btn-default">4. Plans</button>
				</div>
		
			</div>
		</div>
			
		<form method="POST" action="" class="" >
		
		<div class="row text-center">
			<div class="col-lg-8 col-lg-offset-2">
		
				<div id="panel-1" class="panel panel-primary">
					<div class="panel-heading">
						Business Information
					</div>
					<div class="panel-body">
						<div class="form-group">
							<input type="text" class="form-control" name="owner" placeholder="Your Name" />
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Your Business Name" />
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="Business Address" />
						</div>
					</div>
				</div>
		
				<div id="panel-2" class="panel panel-primary">
					<div class="panel-heading">
						Select your business' location on the google map
					</div>
					<div class="panel-body">
						<input id="lat" type="hidden" name="latitude" required="">
						<input id="lng" type="hidden" name="longitude" required="">
						<p id="locText">---</p>
						<div id="map"></div>
					</div>
				</div>
		
				<div id="panel-3" class="panel panel-primary">
					<div class="panel-heading">
						Account Information
					</div>
					<div class="panel-body">
				
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Pick a username" />
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password (min 8 characters)" />
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" />
						</div>
						
					</div>
				</div>
		
				<div id="panel-4" class="panel panel-primary">
					<div class="panel-heading">
						Select Membership Type
					</div>
					<div class="panel-body">
			
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="service-item">
									<span class="fa-stack fa-4x">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-cube fa-stack-1x text-primary"></i>
								</span>
									<h4>
										<strong>Free</strong>
									</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<a href="#" class="btn btn-light">Learn More</a>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="service-item">
									<span class="fa-stack fa-4x">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-cubes fa-stack-1x text-primary"></i>
								</span>
									<h4>
										<strong>Premium</strong>
									</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<a href="#" class="btn btn-light">Learn More</a>
								</div>
							</div>
						</div>
						
						<button type="submit" class="btn btn-large btn-block btn-success">Complete Your Registration</button>
						
					</div>
				</div>
			
			</div>
		</div>
		
		</form>
		
		
	</div>
	<!-- /.container -->
</section>
@endsection