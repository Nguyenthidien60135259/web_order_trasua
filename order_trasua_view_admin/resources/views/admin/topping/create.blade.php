@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    Thêm topping
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
                                <form id="add_topping" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="form-group">
										<label>Tên topping</label>
										<input type="text" name="name" id="name" class="form-control">
									</div>
									<div class="form-group">
										<label for="image">Hình ảnh topping</label>
										<input type="file" name="image" id="image" class="form-control">
									</div>
									<div class="form-group">
										<label>Giá bán</label>
										<input type="number" name="price" id="price" class="form-control price_format">
									</div>
									<button type="submit" class="btn btn-info">Thêm topping</button>
                                </form>
                            </div>
                        </div>
                    </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#add_topping").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('save_create_topping') }}",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: () => {
                    location.href = '/topping_list';
                },
            });
        });
    </script>

@endsection
