@extends('layouts.public')

@section('title', 'Register')

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
	background-color: #eee;
}
h1 {
	color: #1ab394;
    font-size: 42px;
    font-weight: 700;
    margin: 5px;
}
h2 {
	margin: 0 0 35px 0;
}
.panel-primary {
	border-color: #1ab394;
}
.panel-primary .panel-heading {
	background-color: #1ab394;
	font-size: 20px;
    height: 55px;
}
.service-item {
	border-radius: 10px;
	padding: 5px;
	transition: all 0.5s ease;
	cursor: pointer;
}
.service-item:hover {
	background-color: #1ab394;
}
.form-control {
	text-align: center;
    font-size: 16px;
    padding: 20px 10px;
}
</style>
@endsection

@section('content')
<section id="services" class="fullheight services bg-green">
	<div class="container">
		<div class="row text-center">
		
			<div class="col-lg-12">
				<h1>Great! Since you're a business owner</h1>
				<h2>Register to make your product known</h2>
			</div>
			
		</div>
		
		@yield('sub-content')
		
	</div>
	<!-- /.container -->
</section>
@endsection