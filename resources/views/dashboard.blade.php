@extends('layouts.admin')

@section('heading', 'Dashboard')

@section('content')
	
<div class="row">
	<div class="col-lg-3">
		<div class="widget style1 navy-bg">
			<div class="row">
				<div class="col-xs-4">
					<i class="fa fa-home fa-5x"></i>
				</div>
				<div class="col-xs-8 text-right">
					<span> Total Shops </span>
					<h2 class="font-bold">{{ $shopCount }}</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-4">
					<i class="fa fa-cubes fa-5x"></i>
				</div>
				<div class="col-xs-8 text-right">
					<span> Total Items </span>
					<h2 class="font-bold">{{ $itemCount }}</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="widget style1 yellow-bg">
			<div class="row">
				<div class="col-xs-4">
					<i class="fa fa-location-arrow fa-5x"></i>
				</div>
				<div class="col-xs-8 text-right">
					<span> Visits </span>
					<h2 class="font-bold">1,234</h2>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection