@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
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
                    <form role="form" action="#" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control" placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>  
                            	</select>
                        </div>
                        <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục sản phẩm</button>
                    </form>
                </div>
    		</div>
        </section>
    </div>
</div>
@endsection
