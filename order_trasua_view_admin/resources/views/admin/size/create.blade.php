@extends('admin.base')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm size
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
                    <form action="{{ route('save_size') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên size</label>
                            <input type="text" name="name" class="form-control"> 
                        </div>
                        <button type="submit" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
