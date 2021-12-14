@extends('admin.base')
@section("admin_content")
<div class="table-agile-info">
	<div class="panel panel-default">
	  <div class="table-responsive">
		<table class="table table-striped b-t b-light" id="myTable">
		  <thead>
			<tr align="center">	
				<th style="width:20px;">ID</th>
				<th>Customer name</th>
				<th>Product</th>
				<th>Comment</th>
				<th>Rating</th>
				<th>Delete</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($comment as $com)
			@foreach($com -> product as $pro)
			@foreach($com -> customer as $cus)
				<tr>
					<td>{{ $com->id }}</td>
					<td>{{ $cus->name }}</td>
					<td>{{ $pro->name }}</td>
					<td>{{ $com->comment }}</td>
					<td>{{ $com->rating }}</td>
					<td>
						<a onclick="return confirm('Bạn có chắc là muốn xóa comment này ko?')" title="Xóa" href="/comment_delete/{{ $com->id }}" class="active styling-edit">
						<i class="fa fa-times text-danger text"></i>
					</td>
				</tr>
			@endforeach
			@endforeach
			@endforeach
		  </tbody>
		</table>
	  </div>
	</div>
</div>
@endsection
