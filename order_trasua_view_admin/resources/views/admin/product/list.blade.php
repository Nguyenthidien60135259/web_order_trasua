@extends('admin.base')
@section('admin_content')
<div class="table-agile-info">
	<div class="panel panel-default">
	  <div class="table-responsive">
		<table class="table table-striped b-t b-light" id="myTable">
		  <thead>
			<tr align="center">	
				<th style="width:20px;"></th>
				<th>Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Size</th>
				<th>Category</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($category as $cate)
				@foreach($cate -> product as $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>
					<td><img src="http://127.0.0.1:8000/products/{{$value->image}}" height="100" width="100"></td>
					<td>{{ number_format($value->price,0,',','.') }} đ </td>
					<td>{{ $value->size_id }}</td>
					<td>{{ $cate->name }}</td>
					<td>
						<a href="" class="active styling-edit" title="Sửa" ui-toggle-class="">
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



