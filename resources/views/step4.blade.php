@extends('layouts.register')

@section('scripts')
<script>
$(function() {
	$('#si1').click(function() {
		$('#si2').css('background-color', 'transparent');
		$('#si1').css('background-color', '#1ab394');
	});
	$('#si2').click(function() {
		$('#si1').css('background-color', 'transparent');
		$('#si2').css('background-color', '#1ab394');
	});
});
</script>
@endsection

@section('sub-content')

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div id="panel-4" class="panel panel-primary">
			<div class="panel-heading">
				<a href="{{ url('/step-3') }}" class="btn btn-primary pull-left" >Previous</a>
				Select Membership Type
			</div>
			<div class="panel-body">
	
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div id="si1" class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-cube fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Free</strong>
							</h4>
							<p>Standard Features</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div id="si2" class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-cubes fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Premium ($3/month)</strong>
							</h4>
							<p>Premium Map Markers, Voucher, and many more</p>
						</div>
					</div>
				</div>
				
				<a href="{{ url('/vendor') }}" class="btn btn-large btn-block btn-success">Complete Your Registration</a>
				
			</div>
		</div>
	
	</div>
</div>

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div class="lol-group btn-group-lg btn-group" role="group">
		  <a href="{{ url('/step-1') }}" class="btn btn-default">1. Business</a>
		  <a href="{{ url('/step-2') }}" class="btn btn-default">2. Geolocation</a>
		  <a href="{{ url('/step-3') }}" class="btn btn-default">3. Account</a>
		  <a href="{{ url('/step-4') }}" class="active btn btn-default">4. Plans</a>
		</div>

	</div>
</div>
@endsection