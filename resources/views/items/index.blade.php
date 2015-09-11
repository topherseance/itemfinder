@extends('layouts.admin')

@section('heading', 'All Items Sold on Shop: ' . $shop->name )

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

<a href="{{ route('admin.items.getCreate', $shop->id) }}" class="btn btn-block btn-primary">Create New Item</a>

<div class="row">
	<div class="col-lg-12">
	
		<div class="ibox float-e-margins">
            <div class="ibox-content">
			
				<table class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Item Name</th>
						<th>Image</th>
						<th>Description</th>
						<th>Price</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 0; ?>
				@foreach($shop->items as $item)
					<?php $i++; ?>
					<tr>
						<td>{{ $i }}</td>
						<td>{!! $item->name !!}</td>
						<td><img src="{{ asset(substr( $item->image_url, strpos($item->image_url, 'uploads/'))) }}" /></td>
						<td>{!! $item->description !!}</td>
						<td>{!! $item->price !!}</td>
						<td>
							<a href="{{ route('admin.items.view', $item->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">
								<i class="fa fa-eye"></i>
							</a>
							<a href="{{ route('admin.items.getEdit', $item->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fa fa-edit"></i>
							</a>
							<a href="{{ route('admin.items.getDelete', $item->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
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