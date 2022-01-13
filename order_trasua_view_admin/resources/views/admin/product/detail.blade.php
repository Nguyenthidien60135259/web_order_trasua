@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <?php
                $message = Session::get('message');
            	if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">
                <div class="position-center">
					<form id="update_product" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" name="name" class="form-control" value="{{$product->name}}">
						</div>		
						<div class="form-group">
							<label>Hình ảnh sản phẩm</label>
							<input type="file" name="image" class="form-control">
							<img src="http://127.0.0.1:8000/products/{{$product->image}}" height="100" width="100">
						</div>
						<div class="form-group">
							<label >Mô tả sản phẩm</label>
							<textarea style="resize: none"  rows="8" class="form-control" name="desc" placeholder="Mô tả sản phẩm">{{$product->desc}}</textarea>
						</div>
						
						<div class="form-group">
							<label>Giá bán</label>
							<input type="number" value="{{$product->price}}" name="price" class="form-control price_format">
						</div>
						<div class="form-group">
							<label>Giá gốc</label>
							<input type="number" name="price_cost" class="form-control price_format" value="{{$product->price_cost}}">
						</div>
						<div class="form-group">
							<label>Danh mục sản phẩm</label>
							<select name="category_id" class="form-control input-sm m-bot15">
								@foreach($category as $key => $cate)
                                    @if($cate->id == $product->category_id)
                                        <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                                    @else
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endif
                                @endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label ">Size</label>
							<select name="size_id" class="form-control input-sm m-bot15">
								@foreach($size as $key => $si)
                                    @if($si->id == $product->size_id)
                                        <option selected value="{{$si->id}}">{{$si->name}}</option>
                                    @else
                                        <option value="{{$si->id}}">{{$si->name}}</option>
                                    @endif
                                @endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
					</form>				
                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('ckeditor' );
</script>
<script>
	$("#update_product").submit(function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$.ajax({
			type: "POST",
			url: "{{ url('save_product_updated') }}" + '/' + {{$id}},
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: () => {
				location.href = '/product_list';
			},
		}); 
	});
</script>
@endsection
