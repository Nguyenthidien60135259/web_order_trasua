@extends('layout.index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@section('title', 'Cart')
@section('content')
<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(http://127.0.0.1:8000/introducts/store.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Cart</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					@if (session('message'))
					<div class="alert alert-success">
						<p class="text-center">{{ session('message') }}</p>
					</div>
					@elseif(session('error'))
					<div class="alert alert-error">
						<p class="text-center">{{ session('error') }}</p>
					</div>
					@endif
					<a href="{{ url('deleteall') }}">Delete All</a>
					<table id="cart" class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Size</th>
								<th>Topping</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							@php $total = 0 @endphp
							@php $subtotal = 0 @endphp
							@if(Cookie::has('item'))
							@foreach($cart as $key => $cart)
							<?php
							if ($cart['size'] == 'M') {
								$total = $cart['price'] * $cart['quantity'] + $cart['toppingList'] * 5000;
							} else {
								if ($cart['size'] == 'L') {
									$total = $cart['price'] * $cart['quantity'] + $cart['toppingList'] * 5000 + $cart['quantity'] * 5000;
								} else {
									$total = $cart['price'] * $cart['quantity'] + $cart['toppingList'] * 5000 + $cart['quantity'] * 10000;
								}
							}

							$subtotal += $total;
							?>

							<tr class="text-center" data-id="{{ $key }}">
								<td>
									<a href="{{ url('delete/'.$cart['id']) }}"><span class="icon-close  btn-sm remove-from-cart"></span>Xóa</a>
								</td>
								</td>
								<td class="image-prod">
									<img class="img" src="http://127.0.0.1:8000/products/{{$cart['image']}}">
								</td>

								<td class="product-name">
									<h3>{{ $cart['name'] }}</h3>
								</td>
								<td class="price">{{ number_format($cart['price'],0,',','.') }}</td>
								<td>
									<form action="{{ url('setquantity/'.$cart['id']) }}" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<input type="number" name="quantity" value="{{ $cart['quantity'] }}" class="form-control quantity" min="1" max="10" />
										<button type="submit" name="Change" class="btn btn-primary py-3 px-5">Change</button>
									</form>
								</td>
								<td class="product-size">
									<h3>{{ $cart['size'] }}</h3>
								</td>

								<td class="monthem">
									<h5>{{$cart['topping']}}</h5>
								</td>
								<td class="total">
									<h3><strong>{{ $total }}</strong></h3>
								</td>

							</tr><!-- END TR-->
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<hr>
					<p class="d-flex" name="subtotal" value="{{$subtotal}}">
						<span>Subtotal</span>
						<span>{{$subtotal}}</span>
					</p>
					<hr>
					@if(Auth::check())
					<p class="text-center"><a href="checkout" class="btn btn-primary py-3 px-4">Checkout</a></p>
					@else
					<p class="text-center"><a href="getLogin" class="btn btn-primary py-3 px-4">Login</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
