@extends('layouts.register')

@section('sub-content')

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div id="panel-3" class="panel panel-primary">
			<div class="panel-heading">
				<a href="{{ url('/step-2') }}" class="btn btn-primary pull-left" >Previous</a>
				Account Information
				<a href="{{ url('/step-4') }}" class="btn btn-primary pull-right" >Next</a>
			</div>
			<div class="panel-body">
				
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
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
				
			</div>
		</div>
	
	</div>
</div>

<div class="row text-center">
	<div class="col-lg-8 col-lg-offset-2">

		<div class="lol-group btn-group-lg btn-group" role="group">
		  <a href="{{ url('/step-1') }}" class="btn btn-default">1. Business</a>
		  <a href="{{ url('/step-2') }}" class="btn btn-default">2. Geolocation</a>
		  <a href="{{ url('/step-3') }}" class="active btn btn-default">3. Account</a>
		  <a href="{{ url('/step-4') }}" class="btn btn-default">4. Plans</a>
		</div>

	</div>
</div>
@endsection