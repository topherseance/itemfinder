<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
	public function index()
	{
		return view('dashboard')
				->with('shopCount', Shop::count())
				->with('itemCount', Item::count());
	}
}
