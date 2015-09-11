<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Shop;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
	
	public function index()
	{
		$shops = Shop::all();
		return view('shops.index')
				->with('shops', $shops);
	}
	
	public function view($id)
	{
		return view('shops.view');
	}
	
	public function getCreate()
	{
		return view('shops.create');
	}
	
	public function getEdit($id)
	{
		return view('shops.view');
	}
	
	public function getDelete($id)
	{
		return view('shops.view');
	}
	
	public function postCreate(Request $httpReq)
	{
		$this->validate($httpReq, [
			'name' => 'required',
			'owner' => 'required',
			'address' => 'required',
			'latitude' => 'required',
			'longitude' => 'required'
		]);
		
		$shop = new Shop;
		$shop->name = $httpReq->input('name');
		$shop->owner = $httpReq->input('owner');
		$shop->address = $httpReq->input('address');
		$shop->latitude = $httpReq->input('latitude');
		$shop->longitude = $httpReq->input('longitude');
		$shop->save();
		
        Session::flash('message', 'Campaign successfully created!');
        Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.shops.index');
	}
	
	public function postEdit($id, Request $httpReq)
	{
		$shop = Shop::findOrFail($id);
		
		$this->validate($httpReq, [
			'name' => 'required',
			'owner' => 'required',
			'address' => 'required',
			'latitude' => 'required',
			'longitude' => 'required'
		]);
		
		$shop->name = $httpReq->input('name');
		$shop->owner = $httpReq->input('owner');
		$shop->address = $httpReq->input('address');
		$shop->latitude = $httpReq->input('latitude');
		$shop->longitude = $httpReq->input('longitude');
		$shop->save();
		
        Session::flash('message', 'Campaign successfully edited!');
        Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.shops.index');
	}
	
	public function postDelete($id, Request $httpReq)
	{
		$shop = Shop::findOrFail($id);
		
		$shop->delete();
		
        Session::flash('message', 'Campaign deleted!');
        Session::flash('alert-class', 'alert-info');
		return redirect()->route('admin.shops.index');
	}
}
