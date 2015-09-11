@extends('layouts.public')

@section('title', 'Home')

@section('styles')
<style>
.custom-form {
	max-width: 300px;
	margin: 0 auto;
	font-size: 24px;
	height: 60px;
	padding: 10px 20px;
	text-align: center;
}
</style>
@endsection

@section('scripts')
<script>
$(function() {
	$(document).keypress(function(e) {
		if (e.which == 13) {
			$('#myForm').submit();
		}
	});
});
</script>
@endsection

@section('content')
<!-- Header -->
<header id="top" class="header">
	<div class="text-vertical-center">
		<h1>Item Finder</h1>
		<br>
		<h3>You want to find:</h3>
		<form id="myForm" action="{{ route('public.find') }}" method="GET">
			<input type="text" name="name" id="myTextfield" class="custom-form form-control" placeholder="Name of the item" />
		</form
	</div>
</header>

<!-- Services -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<section id="services" class="services bg-success">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-10 col-lg-offset-1">
				<h2>Our Services</h2>
				<hr class="small">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-cloud fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Service Name</strong>
							</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<a href="#" class="btn btn-light">Learn More</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-compass fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Service Name</strong>
							</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<a href="#" class="btn btn-light">Learn More</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-flask fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Service Name</strong>
							</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<a href="#" class="btn btn-light">Learn More</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="service-item">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-shield fa-stack-1x text-primary"></i>
						</span>
							<h4>
								<strong>Service Name</strong>
							</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<a href="#" class="btn btn-light">Learn More</a>
						</div>
					</div>
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.col-lg-10 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>
@endsection