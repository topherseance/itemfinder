<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;
use App\Item;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    
	public function index()
	{
		return view('home');
	}
    
	public function register()
	{
		return view('auth.register');
	}
	
	public function find(Request $httpReq)
	{
		$name = $httpReq->input('name');
		$itemsFound = Item::where('name', $name)->get();
		
		if (count($itemsFound) < 1)
		{
			return 'No items found';
		}
		
		$shopsIds = [];
		foreach($itemsFound as $item)
		{
			$shopsIds[] = $item->shop_id;
		}
		$shopsIdsUnique = array_unique($shopsIds);
		
		$shopsFound = Shop::whereIn('id', $shopsIdsUnique)->get();
		
		return view('find')
				->with('name', $name)
				->with('shopsFound', $shopsFound)
				->with('itemsFound', $itemsFound);

	}
	
}
