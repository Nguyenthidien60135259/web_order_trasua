@extends('admin.base')
@section('admin_content')
<div class="table-agile-info">
	<div class="panel panel-default">
	  <div class="table-responsive">
		<table class="table table-striped b-t b-light" id="myTable">
		  <thead>
			<tr align="center">	
				<th style="width:20px;"></th>
				<th>Tên</th>
				<th>Ảnh</th>
				<th>Giá bán</th>
				<th>Giá gốc</th>
				<th>Size</th>
				<th>Category</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		  </thead>
		  <tbody>
			  @php
				  $i=0;
			  @endphp
					@foreach($category as $cate)
						@foreach($cate -> product as $value)
							@php
								$i++;
							@endphp
							
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $value->name }}</td>
								<td><img src="http://127.0.0.1:8000/products/{{$value->image}}" height="100" width="100"></td>
								<td>{{ number_format($value->price,0,',','.') }} đ </td>
								<td>{{ number_format($value->price_cost,0,',','.') }} đ </td>
								
								@if ($value->size_id == 1)
									<td>M</td>
								@elseif ($value->size_id == 2)
									<td>L</td>
								@elseif ($value->size_id == 3)
									<td>XL</td>
								@endif
								
								
								<td>{{ $cate->name }}</td>
								<td>
									<a href="/product_detail/{{$value->id}}" class="active styling-edit" title="Sửa" ui-toggle-class="">
									<i class="fa fa-pencil-square-o text-success text-active"></i></a>
								</td>
								<td>
									<a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" title="Xóa" href="/product_delete/{{$value->id}}" class="active styling-edit" ui-toggle-class="">
									<i class="fa fa-times text-danger text"></i>
								</td>
							</tr>
						
						
				@endforeach
			@endforeach
		  </tbody>
		</table>
	  </div>
	</div>
</div>
@endsection



