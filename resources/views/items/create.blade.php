@extends('layouts.admin')

@section('heading', 'Create New Item')

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
				<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.items.postCreate', $shop->id) }}" enctype='multipart/form-data'>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $shop->name }}" disabled>
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<input type="text" name="description" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
							<input type="text" name="price" class="form-control" required="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-sm-2 control-label">Upload Image</label>
						<div class="col-sm-10">
							<input type="file" name="file" class="form-control" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button type="submit" class="btn btn-primary block full-width m-b">Create</button>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-danger block full-width m-b" href="{{ route('admin.items.index', $shop->id) }}">Cancel</a>
						</div>
					</div>
				</form>
			
			</div>
		</div>
		
	</div>
</div>

@endsection