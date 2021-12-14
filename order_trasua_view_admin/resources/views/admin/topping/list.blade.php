@extends('admin.base')
@section("admin_content")
<div class="table-agile-info">
	<div class="panel panel-default">
	  <div class="table-responsive">
		<table class="table table-striped b-t b-light" id="myTable">
		  <thead>
			<tr align="center">	
				<th style="width:20px;">ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Image</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($topping as $t)
				<tr>
					<td>{{ $t->id }}</td>
					<td>{{ $t->name }}</td>
					<td>{{ number_format($t->price,0,',','.') }}đ</td>
					<td>
						<img src="http://127.0.0.1:8000/toppings//{{ $t->image }}" height="60" width="60">
					</td>
					<td>
						<a href="/show_topping/{{ $t->id }}" class="active styling-edit" title="Sửa">
						<i class="fa fa-pencil-square-o text-success text-active"></i></a>
					</td>
					<td>
						<a onclick="return confirm('Bạn có chắc là muốn xóa Topping {{$t->name}} này ko?')" title="Xóa" href="/topping_delete/{{ $t->id }}" class="active styling-edit">
						<i class="fa fa-times text-danger text"></i>
					</td>
				</tr>
			@endforeach
		  </tbody>
		</table>
	  </div>
	</div>
</div>
@endsection
