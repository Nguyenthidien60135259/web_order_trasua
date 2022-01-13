@extends('admin.base')
@section("admin_content")
<div class="table-agile-info">
	<div class="panel panel-default">
	  <div class="table-responsive">
		<table class="table table-striped b-t b-light" id="myTable">
		  <thead>
			<tr align="center">
				<th style="width:20px;">ID</th>
				<th>Customer Name</th>
				<th>Date Order</th>
				<th>Status</th>
				<th>Update</th>
			</tr>
		  </thead>
		  <tbody>
			  @php
				  $i=0;
			  @endphp
			@foreach($order as $ord)
				@foreach($ord -> customer as $cus)
					@php
						$i++;
					@endphp
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $cus->name }}</td>
					<td>{{ $ord->order_date }}</td>

					@if($ord->status == 0)
						<td style="font-weight: 800;color: blue" >Đơn hàng mới</td>
					@elseif ($ord->status == 1)
						<td style="font-weight: 800;color: green">Đã giao hàng</td>
					@elseif ($ord->status==2)
						<td style="font-weight: 800;color: red">Đã hủy</td>
					@endif

					<td>
						<a href="/order_detail/{{$ord->id}}" class="active styling-edit" title="Chi tiết">
						<i class="fa fa-pencil-square-o text-success text-active"></i></a>
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
