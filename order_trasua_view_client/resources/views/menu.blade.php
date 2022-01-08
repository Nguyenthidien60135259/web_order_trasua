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
            @foreach($category as $type)
            <div class="col-md-6 mb-5 pb-3">
                <h3 class="mb-5 heading-pricing ftco-animate">{{$type->name}}</h3>
                @foreach($type->products as $product)
                <div class="pricing-entry d-flex ftco-animate">
                <a href="/detail/{{ $product->id }}">
                    <div class="img" style="background-image: url(http://127.0.0.1:8001/products/{{$product->image}});"></div>
                </a>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3 ><span><a href="/detail/{{$product->id}}">{{$product->name}}</a></span></h3>
                            <span class="price">{{ number_format($product->price,0,',','.') }} đ</span>
                        </div>
                        <div class="d-block">
                            <p>{{$product->desc}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Khám phá</span>
                <h2 class="mb-4">LeoTea đặc biệt</h2>
                <p>Top LeoTea được ưa chuộng nhất</p>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">New LeoTea</a>

                            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hot LeoTea</a>

                            <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Cheap LeoTea</a>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                        <div class="tab-content ftco-animate" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                <div class="row">
                                    @foreach($product_new as $new)
                                    <div class="col-md-4 text-center">
                                        <div class="menu-wrap">
                                            <a href="/detail/{{$new->id}}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8001/products/{{$new->image}});"></a>
                                            <div class="text">
                                                <h3><a href="/detail/{{ $new->id }}">{{$new->name}}</a></h3>
                                                <!-- <p>{{$new->name}}</p> -->
                                                <p class="price"><span>{{ number_format($new->price,0,',','.') }} đ</span></p>
                                                <p><a href="{{ url('add-cart/'.$new->id) }}" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                <div class="row">
                                    @foreach($product_expensive as $expensive)
                                    <div class="col-md-4 text-center">
                                        <div class="menu-wrap">
                                            <a href="/detail/{{ $expensive->id }}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8001/products/{{$expensive->image}});"></a>
                                            <div class="text">
                                                <h3><a href="/detail/{{ $expensive->id }}">{{$expensive->name}}</a></h3>
                                                <!-- <p>{{$expensive->desc}}</p> -->
                                                <p class="price"><span>{{ number_format($expensive->price,0,',','.') }} đ</span></p>
                                                <p><a href="{{ url('add-cart/'.$expensive->id) }}" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                                <div class="row">
                                    @foreach($product_cheap as $cheap)
                                    <div class="col-md-4 text-center">
                                        <div class="menu-wrap">
                                            <a href="/detail/{{ $cheap->id }}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8001/products/{{$cheap->image}});"></a>
                                            <div class="text">
                                                <h3><a href="/detail/{{ $cheap->id }}"></a>{{$cheap->name}}</h3>
                                                <!-- <p>{{$cheap->desc}}</p> -->
                                                <p class="price"><span>{{ number_format($cheap->price,0,',','.') }} đ</span></p>
                                                <p><a href="{{ url('add-cart/'.$cheap->id) }}" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection