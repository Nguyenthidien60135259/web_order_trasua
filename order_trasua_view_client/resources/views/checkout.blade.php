@extends('layout.index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@section('title', 'Cart')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
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
        <form action="postCheckOut" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <table id="cart" class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
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
                                    </td>
                                    <td class="image-prod">
                                        <img class="img" src="http://127.0.0.1:8001/products/{{$cart['image']}}">
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $cart['name'] }}</h3>
                                    </td>

                                    <td class="price">{{ number_format($cart['price'],0,',','.') }}</td>

                                    <td name="quantity">
                                        <h3>{{$cart['quantity']}}</h3>
                                    </td>
                                    <td class="product-size" name="size">
                                        <h3>{{ $cart['size'] }}</h3>
                                    </td>

                                    <td class="monthem" name="topping">
                                        <h5>{{$cart['topping']}}</h5>
                                    </td>
                                    <td class="total" name="total">
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
                        <p class="d-flex">
                            <input name="subtotal" type="hidden" value="{{ $subtotal }}">
                            <span>Subtotal</span>
                            <span name="subtotal">{{$subtotal}}</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Information-->
            @if(Auth::check())
                <div class="row">
                <div class="col-xl-8 ftco-animate">
                    <h3 class="mb-4 billing-heading">VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN</h3>
                    <div class="row align-items-end">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$customer->name}}" >
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Address</label>
                                <input type="text" name="address" class="form-control" value="{{$customer->address}}">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{$customer->phone}}">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emailaddress">Note</label>
                                <input type="text" name="note" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group mt-4">
                            <div class="radio">
                                <label class="mr-3"><a href="getSignUp" class="nav-link"> Create an Account?</a> </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Thanh toan khi nhan hang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2">ZaloPay</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            
            @else
            <div class="row">
                <div class="col-xl-8 ftco-animate">
                    <h3 class="mb-4 billing-heading">VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN</h3>
                    <div class="row align-items-end">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emailaddress">Note</label>
                                <input type="text" name="note" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group mt-4">
                            <div class="radio">
                                <label class="mr-3"><a href="getSignUp" class="nav-link"> Create an Account?</a> </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Thanh toan khi nhan hang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2">ZaloPay</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         @endif <!-- .col-md-8 -->
            <p class="text-center">
                <button type="submit" href="{{ url('postCheckOut')}}" class="btn btn-primary">Gui don hang</button>
            </p>
            <!-- <i class="btn btn-primary py-3 px-4" >Gui don hang</i></p> -->
        </form>
    </div>
</section>


@endsection