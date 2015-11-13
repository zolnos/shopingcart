<?php namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$products = Product::all();

		$cartSession = Session::get('cart', []);



		if(!empty($cartSession)) {

			$cart = Product::whereIn('id', $cartSession)->lists('name');
//			dd($cart);
		}
		else {
			$cart = [];
		}

		return view('welcome', compact('products', 'cart'));
	}

	public function store() {

		$data = Input::get('selected_product', false);

		if($data) {
			$userCart = Session::get('cart', []);

			if(!in_array($data, $userCart)) {
				array_push($userCart, $data);
				Session::set('cart', $userCart);

				Product::find($data)->logIt();

			}

		}


		return redirect('/');
	}


}
