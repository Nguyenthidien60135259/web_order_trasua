@extends('layout.index')
@section('title', 'Product')
@section('content')

    <!-- @foreach ($products as $key)
        <h1>{{ $key-> name }}</h1>
        <h1>{{ $key-> price }}</h1>
    @endforeach -->
    <section class="home-slider owl-carousel">
    <div class="slider-item"><img src="http://127.0.0.1:8000/introducts/review2.jpg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome Leo Tea</span>
                    <h1 class="mb-4">The Best Leo Tea Experience</h1>
                    <p class="mb-4 mb-md-5">Leo Tea hương vị của ngọt ngào và tươi mới </p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="getMenu" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(http://127.0.0.1:8000/introducts/story.jpg);"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Khám phá</span>
                <h2 class="mb-4">Leo Tea</h2>
            </div>
            <div>
                <p>THANH XUÂN TƯƠI ĐẸP có mấy khi mà hững hờ. Ở đây chúng mình không chỉ bán nước và đồ ăn, mà còn là nơi để các bạn trao nỗi niềm, trút bầu tâm sự... Góc nhỏ Leotea là nơi chứng kiến những câu chuyện tình yêu dễ thương, dỗi hờn vu vơ, những sẻ chia khó khăn trong cuộc sống, tìm định hướng hay con đường lập nghiệp... Leotea rất hạnh phúc khi là một phần thanh xuân của Homies đấy 😊
                    Cuối tuần không biết làm gì, buồn cũng được, vui cũng được, ghé nhà Leotea chơi thưởng thức ly trà ngon chắc chắn sẽ up mood hơn rất nhiều nha</p>
            </div>
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
                                            <a href="/detail/{{$new->id}}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8000/products/{{$new->image}});"></a>
                                            <div class="text">
                                                <h3><a href="/detail/{{ $new->id }}">{{$new->name}}</a></h3>
                                                <!-- <p>{{$new->name}}</p> -->
                                                <p class="price"><span>{{ number_format($new->price,0,',','.') }} đ</span></p>
                                                <p><a href="/addCart/{{$new->id}}" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
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
                                            <a href="/detail/{{ $expensive->id }}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8000/products/{{$expensive->image}});"></a>
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
                                            <a href="/detail/{{ $cheap->id }}" class="menu-img img mb-4" style="background-image: url(http://127.0.0.1:8000/products/{{$cheap->image}});"></a>
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
