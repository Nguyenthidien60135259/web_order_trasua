<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
	public function index()
	{
		$cart = unserialize(Cookie::get('item'));
		return view('cart', compact('cart'));
	}
	//add to cart
	public function addCart($id, Request $request)
	{
		// $product = Product::findorFail($id);
		$response = Http::get("http://127.0.0.1:8001/api/addtocart/" . $request->id);
		$data = json_decode($response);
		$product = $data->data->product;
		if (Cookie::has('item')) {
			$found = in_array($id, array_column(unserialize(Cookie::get('item')), 'id'));
			if ($found) {
				$cart = unserialize(Cookie::get('item'));
				$key = array_search($id, array_column($cart, 'id'));
				$cart[$key]['quantity'] += 1;
				Cookie::queue(Cookie::make('item', serialize($cart), 60));
				return redirect('cart')->with('message', 'Đã thêm vào giỏ!');
			}
			$cart = unserialize(Cookie::get('item'));
		}

		if ($request->quantity == NULL) {
			$cart[] = ['id' => $id, 'name' => $product->name, 'price' => $product->price, 'quantity' => 1, 'size' => 'M', 'toppingList' => 0, 'topping' => 'Không thêm', 'image' => $product->image];
		} else {
			if ($request->topping == NULL) {
				$cart[] = ['id' => $id, 'name' => $product->name, 'price' => $product->price, 'quantity' => $request->quantity, 'size' => $request->size, 'toppingList' => 0, 'topping' => 'Không thêm', 'image' => $product->image];
			} else
				$cart[] = ['id' => $id, 'name' => $product->name, 'price' => $product->price, 'quantity' => $request->quantity, 'size' => $request->size, 'toppingList' => count($request->topping), 'topping' => implode(', ', $request->topping), 'image' => $product->image];
		}

		//Khởi tạo giỏ hàng bằng cookie
		Cookie::queue(Cookie::make('item', serialize($cart), 1440));
		return redirect('cart')->with('message', 'Đã thêm vào giỏ!');
	}

	//update cart
	public function setquantity($id, Request $request)
	{
		$cart = unserialize(Cookie::get('item'));
		$key = array_search($id, array_column($cart, 'id'));
		$cart[$key]['quantity'] = $request->quantity;
		// dd($cart);
		Cookie::queue(Cookie::make('item', serialize($cart), 60));
		return back()->with('message', 'Thay đổi số lượng thành công!');
	}
	//delete
	public function delete($id)
	{
		$cart = unserialize(Cookie::get('item'));
		$key = array_search($id, array_column($cart, 'id'));
		unset($cart[$key]);
		$cart = array_values(($cart));
		Cookie::queue(Cookie::make('item', serialize($cart), 1440));
		return back()->with('message', 'Đã xóa khỏi giỏ!');
	}
	//delete all
	public function deleteall()
	{
		Cookie::queue(Cookie::forget('item'));
		return back()->with('message', 'Đã xóa tất cả sản phẩm!');
	}

	public function getCheckOut(Request $request)
	{
		if (Auth::check()) {
			$cart = unserialize(Cookie::get('item'));
			$id = Auth::user()->id;
			$response = Http::get("http://127.0.0.1:8001/api/checkOut/" . $id);
			$data = json_decode($response);
			$customer = $data->data->customer;
			return view('checkout', compact('cart', 'customer'));
		} else {
			$cart = unserialize(Cookie::get('item'));
			return view('checkout', compact('cart'));
		}
	}
	public function postCheckOut(Request $request)
	{
		$cart = unserialize(Cookie::get('item'));
		$cartjson = json_encode($cart);
		$user_id = Auth::user()->id;
		$response = Http::withHeaders([
			'X-First' => 'foo',
			'X-Second' => 'bar',
			'content-type' => 'application/json; charset=utf8'
		])->post("http://127.0.0.1:8001/api/postCheckOut/", [
			'total' => $request->subtotal,
			'cart' => $cartjson,
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'note' => $request->note,
			'user_id' => $user_id,
		]);
		
		$data = json_decode($response);
		// dd($data);
		Cookie::queue(Cookie::forget('item'));
		return redirect('wait');
	}
}
