@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    Thêm sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="add_product" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm""> 
                        </div>
                                
                        <div class="form-group">
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control">
                        </div>
						<div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea style="resize: none"  rows="8" class="form-control" name="desc" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
						<div class="form-group">
                            <label>Giá bán</label>
                            <input type="number" name="price" class="form-control price_format">
                        </div>
                        <div class="form-group">
                            <label>Giá gốc</label>
                            <input type="number" name="price_cost" class="form-control price_format">
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Size</label>
                            <select name="size_id" class="form-control input-sm m-bot15">
                                @foreach($size as $si)
                                    <option value="{{$si->id}}">{{$si->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#add_product").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('save_create_product') }}",
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

