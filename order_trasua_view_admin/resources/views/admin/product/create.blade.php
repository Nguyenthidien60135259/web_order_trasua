@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    Thêm sản phẩm
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
                                <form role="form" action="{{ route('save_create_product') }}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="name" class="form-control " placeholder="Tên sản phẩm""> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán</label>
                                    <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="price" class="form-control price_format" id="" placeholder="Tên danh mục">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="category_id" class="form-control " placeholder="Tên sản phẩm""> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Size</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="size_id" class="form-control " placeholder="Tên sản phẩm""> 
                                </div>
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </section>

    </div>
@endsection

