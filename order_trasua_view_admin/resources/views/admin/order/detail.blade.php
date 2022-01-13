@extends('admin.base')
@section('admin_content')
<div class="table-agile-info">

  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>

   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Giới tính</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customer as $cus)
          <tr>
            <td>{{$cus->name}}</td>
            <td>{{$cus->phone}}</td>
            <td>{{$cus->address}}</td>
            @if($cus->sex==0)
              <td>Nam</td>
            @elseif ($cus->sex==1)
              <td>Nữ</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
   </div>
  </div>
</div>
<br>

<div class="table-agile-info">

  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách nhận hàng
    </div>

   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Tên người nhận</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Ghi chú</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order as $or)
          <tr>
            <td>{{$or->name}}</td>
            <td>{{$or->phone}}</td>
            <td>{{$or->address}}</td>
            <td>{{$or->note}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
   </div>
  </div>
</div>

<br>



<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>

    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=0;
              $subtotal=0;
          @endphp

            @foreach($product as $pro)
                @php
                  $i++;
                  $total = ($pro->quantity * $pro->product->price);
                  $subtotal += $total;
                @endphp
                <tr>
                    <td>
                      <img src="http://127.0.0.1:8000/products/{{$pro->product->image}}" height="50" width="50">
                    </td>
                    <td>{{$pro->product->name}}</td>
                    @if ($pro->size_id == 1)
                        <td>M</td>
                        <td>{{$pro->quantity}}</td>
                        <td>{{ number_format($pro->product->price,0,',','.') }}đ</td>
                        <td>{{ number_format($pro->product->price_cost,0,',','.') }}đ</td>
                        <td>{{number_format($total,0,',','.') }} đ</td>
                    @elseif ($pro->size_id == 2)
                        @php
                            $price_L = $pro->product->price + 5000;
                        @endphp
                        <td>L</td>
                        <td>{{$pro->quantity}}</td>
                        <td>{{ number_format($pro->product->price+5000,0,',','.') }}đ</td>
                        <td>{{ number_format($pro->product->price_cost+5000,0,',','.') }}đ</td>
                        <td>{{number_format($pro->quantity * $price_L,0,',','.') }} đ</td>
                    @elseif ($pro->size_id == 3)
                        @php
                            $price_XL = $pro->product->price + 10000;
                        @endphp
                        <td>XL</td>
                        <td>{{$pro->quantity}}</td>
                        <td>{{ number_format($pro->product->price+10000,0,',','.') }}đ</td>
                        <td>{{ number_format($pro->product->price_cost+10000,0,',','.') }}đ</td>
                        <td>{{number_format($pro->quantity * $price_XL,0,',','.') }} đ</td>
                    @endif


                </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <br>
</div>


<br>



<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      TOPPING
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên topping</th>
            <th>Giá bán</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=0;
              $subtotal_topping = 0;
          @endphp
          @foreach ($order_detail as $ord)
                @php
                  $i++;
                  $convert = explode(',',$ord->listTopping);
                  $count = count($convert);
                @endphp

                @if ($ord->listTopping == "Không thêm")
                  @php

                    $total = 0;
                  @endphp
                <tr>
                    <td>Không thêm</td>
                    <td>0. đ</td>
                    <td>{{number_format($total,0,',','.') }} đ</td>
                </tr>
                @elseif($count >= 1)
                @php
                  $total = 5000 * $count;
                  $subtotal += $total;
                @endphp
                <tr>
                    <td>{{$ord->listTopping}}</td>
                    <td>5.000đ</td>
                    <td>{{number_format($total,0,',','.') }} đ</td>
                </tr>

                {{-- @elseif($count > 1)
                @php
                  $total = 5000 * $count;
                  $subtotal += $total;
                @endphp
                <tr>
                    <td>{{$ord->listTopping}}</td>
                    <td>5.000đ</td>
                    <td>{{number_format($total,0,',','.') }} đ</td>
                </tr>
                --}}
                @endif
          @endforeach
          <tr>
            <td colspan="2">
                @foreach($order as $or)
              <p style="font-weight: 800;color: black;font-size:20px">Thanh toán : {{number_format($or->total,0,',','.')}}đ</p>
                @endforeach
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      @foreach ($order as $or)
        <a target="_blank" href="{{url('/print_order_PDF/'.$or->id)}}">In đơn hàng</a>
      @endforeach
  </div>

  <br>
    <label>CẬP NHẬT ĐƠN HÀNG</label>
    <form id="update_order" method="POST" enctype="multipart/form-data">
      @csrf
      @foreach ($order as $or)
        @if($or->status == 0)
        <select class="form-select" name="status">
            <option>Chọn status</option>
            <option value="1" {{$or->status == "1" ? "selected":""}}>Đã giao hàng</option>
            <option value="2" {{$or->status == "2" ? "selected":""}}>Hủy đơn hàng</option>
        </select>
        @endif

        @if($or->status == 1)
        <select class="form-select" name="status">
            <option>Chọn status</option>
            <option value="2" {{$or->status == "2" ? "selected":""}}>Hủy đơn hàng</option>
        </select>
        @endif
      @endforeach
      <button type="submit" class="btn btn-info">Update order</button>
    </form>
</div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#update_order").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ url('save_order_updated') }}" + '/' + {{$id}},
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: () => {
                    location.href = '/order_list';
                },
            });
        });
</script>
@endsection
