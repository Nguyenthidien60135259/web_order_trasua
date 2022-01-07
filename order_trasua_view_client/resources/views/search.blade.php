@extends('layout.index')
@section('title', 'Product')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(http://127.0.0.1:8001/introducts/review2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="home">Home</a></span> <span>Menu</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="pricing-entry d-flex ftco-animate">
                <a href="/detail/{{ $product->id }}">
                    <div class="img" style="background-image: url(http://127.0.0.1:8001/products/{{$product->image}});"></div>
                </a>
                <div class="desc pl-3">
                    <div class="d-flex text align-items-center">
                        <h3><span><a href="/detail/{{$product->id}}">{{$product->name}}</a></span></h3>
                        <span class="price">{{ number_format($product->price,0,',','.') }} đ</span>
                    </div>
                    <div class="d-block">
                        <p>{{$product->desc}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection