@extends('layouts.register')

@section('sub-content')

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div id="panel-1" class="panel panel-primary">
			<div class="panel-heading">
				Business Information
				<a href="{{ url('/step-2') }}" class="btn btn-primary pull-right" >Next</a>
			</div>
			<div class="panel-body">
				
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
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
				
			</div>
		</div>
	
	</div>
</div>

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div class="lol-group btn-group-lg btn-group" role="group">
		  <a href="{{ url('/step-1') }}" class="btn btn-default active">1. Business</a>
		  <a href="{{ url('/step-2') }}" class="btn btn-default">2. Geolocation</a>
		  <a href="{{ url('/step-3') }}" class="btn btn-default">3. Account</a>
		  <a href="{{ url('/step-4') }}" class="btn btn-default">4. Plans</a>
		</div>

	</div>
</div>
@endsection