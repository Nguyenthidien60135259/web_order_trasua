@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <?php
                $response_data = Session::get('message');
                if($response_data){
                	echo '<span class="text-alert">'.$response_data.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form action="/size_update/{{$id}}/updated" method="post">
                        @csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Tên size</label>
							<input type="text" name="name" class="form-control" value="">
						</div>
                    	<button type="submit" class="btn btn-info">Cập nhật size</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
