<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use Session;
use App\Shop;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
	
	public function index($shopId)
	{
		$shop = Shop::findOrFail($shopId);
		return view('items.index')
				->with('shop', $shop);
	}
	
	public function view($id)
	{
		$item = Item::findOrFail($id);
		return view('items.view')
				->with('item', $item);
	}
	
	public function getCreate($shopId)
	{
		$shop = Shop::findOrFail($shopId);
		return view('items.create')
				->with('shop', $shop);
	}
	
	public function getEdit($id)
	{
		$item = Item::findOrFail($id);
		return view('items.view')
				->with('item', $item);
	}
	
	public function getDelete($id)
	{
		$item = Item::findOrFail($id);
		return view('items.view')
				->with('item', $item);
	}
	
	public function postCreate($shopId, Request $httpReq)
	{
		$this->validate($httpReq, [
			'name' => 'required',
			'file' => 'required|image|max:3000',
			'description' => 'required',
			'price' => 'required'
		]);
		
        // get image
        $image = $httpReq->file('file');
		
        // get extension
        $ext = $image->getClientOriginalExtension();
		
        // generate filenames
        $uniqueName  = uniqid(rand(), true);
        $filename    = $uniqueName . '.' . $ext;
		
        // determine full file location
        $destination = public_path('uploads/' . $filename);
		
        // resize and save
        $imageObject = Image::make($image->getRealPath());
        $imageObject->resize(200, 200)->save($destination);
		
		$item = new Item;
		$item->shop_id = Shop::findOrFail($shopId)->id;
		$item->name = $httpReq->input('name');
		$item->image_url = $destination;
		$item->description = $httpReq->input('description');
		$item->price = $httpReq->input('price');
		$item->save();
		
        Session::flash('message', 'Item successfully created!');
        Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.items.index', $shopId);
	}
	
	public function postEdit($id, Request $httpReq)
	{
		$item = Item::findOrFail($id);
		
		$this->validate($httpReq, [
			'shop_id' => 'required',
			'name' => 'required',
			'image' => 'required|image|max:3000',
			'description' => 'required',
			'price' => 'required'
		]);
		
        // get image
        $image = $httpReq->file('image');
		
        // get extension
        $ext = $image->getClientOriginalExtension();
		
        // generate filenames
        $uniqueName  = uniqid(rand(), true);
        $filename    = $uniqueName . '.' . $ext;
		
        // determine full file location
        $destination = public_path('img/uploads/' . $filename);
		
        // resize and save
        $imageObject = Image::make($image->getRealPath());
        $imageObject->resize(400, 400)->save($destination);
		
		$item->shop_id = Shop::findOrFail($id)->id;
		$item->name = $httpReq->input('name');
		$item->image_url = $destination;
		$item->description = $httpReq->input('description');
		$item->price = $httpReq->input('price');
		$item->save();
		
        Session::flash('message', 'Item successfully created!');
        Session::flash('alert-class', 'alert-success');
		return redirect()->route('admin.items.index');
	}
	
	public function postDelete($id, Request $httpReq)
	{
		$item = Item::findOrFail($id);
		
		$item->delete();
		
        Session::flash('message', 'Item deleted!');
        Session::flash('alert-class', 'alert-info');
		return redirect()->route('admin.items.index');
	}
}
