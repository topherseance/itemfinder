@extends('layouts.admin')

@section('heading', 'Shop List')

@section('scripts')
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection

@section('content')

@if(Session::has('message'))
	<div class="alert alert-dismissable {{ Session::get('alert-class', 'alert-info') }}">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		@if (Session::get('alert-class') == 'alert-success')
			<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
		@else
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		@endif
		{{ Session::get('message') }}
	</div>
@endif

<a href="{{ route('admin.shops.getCreate') }}" class="btn btn-block btn-primary">Create New Shop</a>

<div class="row">
	<div class="col-lg-12">
	
		<div class="ibox float-e-margins">
            <div class="ibox-content">
			
				<table class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Shop Name</th>
						<th>Owner</th>
						<th>Address</th>
						<th>Items</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 0; ?>
				@foreach($shops as $s)
					<?php $i++; ?>
					<tr>
						<td>{{ $i }}</td>
						<td>{!! $s->name !!}</td>
						<td>{!! $s->owner !!}</td>
						<td>{!! $s->address !!}</td>
						<td>{{ count($s->items) }}</td>
						<td>
							<a href="{{ route('admin.items.index', $s->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Items">
								<i class="fa fa-cubes"></i>
							</a>
							<a href="{{ route('admin.shops.getEdit', $s->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fa fa-edit"></i>
							</a>
							<a href="{{ route('admin.shops.getDelete', $s->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
								<i class="fa fa-times"></i>
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
				</table>
			
			</div>
		</div>
		
	</div>
</div>

@endsection