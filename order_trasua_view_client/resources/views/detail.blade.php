@extends('layout.index')
@section('content')
<style>
  #tpTable {
    text-align: left;
    width: 100%;
    padding: 10px;
  }

  .monthem {
    margin-bottom: 30px;
  }
</style>
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(http://127.0.0.1:8001/introducts/review2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Product Detail</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="home">Home</a></span> <span>Product Detail</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="#" name="image" class="image-popup"><img src="http://127.0.0.1:8001/products/{{$products->image}}" class="img-fluid" alt="Colorlib Template"></a>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <form action="{{ url('add-cart/'.$products->id) }}" method="GET">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <h3 name="name">{{$products->name}}</h3>
          <p name="price" class="price"><span>{{ number_format($products->price,0,',','.') }} đ</span></p>
          <p name="desc">{{$products->desc}} </p>
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="form-group d-flex">
                <div class="select-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="size" class="form-control">
                    <option type="select" name="size" value="M">M</option>
                    <option type="select" name="size" value="L">L</option>
                    <option type="select" name="size" value="XL">XL</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="input-group col-md-6 d-flex mb-3">
              <div class="input-group">
                <span class="quantity-left-minus btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> <i class="icon-minus"></i> </span>
                <input type="number" name="quantity" value="1" class="form-control text-center" min="1" max="10">
                <span class="quantity-right-plus btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> <i class=" icon-plus"></i> </span>
              </div>
            </div>
          </div>

          <div name="monthem" class="monthem">
            <label style="font-size: 18px">Thêm topping</label>
            <table id="tpTable">
              <?php
              for ($i = 0; $i < count($topping); $i = $i + 3) {
                echo '<tr>';
                if (isset($topping[$i])) echo '<td><input style="margin-right: 5px" type="checkbox" name="topping[]" value="' . $topping[$i]->name . '">' . $topping[$i]->name . '</td>';
                if (isset($topping[$i + 1])) echo '<td><input style="margin-right: 5px" type="checkbox" name="topping[]" value="' . $topping[$i + 1]->name . '">' . $topping[$i + 1]->name . '</td>';
                if (isset($topping[$i + 2])) echo '<td><input style="margin-right: 5px" type="checkbox" name="topping[]" value="' . $topping[$i + 2]->name . '">' . $topping[$i + 2]->name . '</td>';
                echo '</tr>';
              }
              ?>
            </table>
          </div>
          <button type="submit" class="btn btn-primary py-3 px-5">
            <i class="fa fa-shopping-cart"></i>
            Thêm giỏ hàng
          </button>
        </form>

      </div>
      
    </div>
    @if(Auth::check())
      <div class="well">
        @if(session('thongbao'))
        <div class="alert alert-success">
          {{session('thongbao')}}
        </div>
        @endif
        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
        <form action="comment" method="POST">
          <!-- nhung id vào de biet comment cho sp nao -->
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <input type="hidden" name = "user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name = "product_id" value="{{$products->id}}">
            <textarea class="form-control" name="comment" rows="3"></textarea>
          </div>
          <button type="submit"class="btn btn-primary px-5">Gửi</button>
        </form>
      </div>
      <hr>
      @endif

      <!-- Comment -->
      @foreach($type as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="64px" height="64px" class="media-object" src="http://127.0.0.1:8001/introducts/user.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        <h4 class="col-md-8">{{$cm->comment}}
                    </div>
                </div>
                <hr>
      @endforeach

  </div>
  <div>
</section>
@endsection