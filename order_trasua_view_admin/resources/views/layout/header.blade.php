<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <img src="http://127.0.0.1:8000/introducts/logo.png" data-was-processed="true">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="getHome" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="getMenu" class="nav-link">Thực đơn</a></li>
                <li class="nav-item"><a href="getIntroduct" class="nav-link">Giới thiệu</a></li>
                <li class="nav-item"><a href="getContact" class="nav-link">Liên hệ</a></li>
                <li class="nav-item cart"><a href="{{ url('cart') }}" class="nav-link"><span class="icon icon-shopping_cart"></span></a></li>
                
                @if(Auth::check())
                <li class="nav-item" class="nav-link"><a href="ttcn" class="nav-link">{{Auth::user()->name}}</a></li>   
                <li class="nav-item" class="nav-link"><a href="logout" class="nav-link">Đăng xuất</a></li>
                @else
                <!-- <li class="nav-item" class="nav-link"><a href="logout" class="nav-link">Đăng xuất</a></li> -->
                <li class="nav-item" class="nav-link"><a href="getLogin" class="nav-link">Đăng nhập</a></li>
                <li class="nav-item" class="nav-link"><a href="getSignUp" class="nav-link">Đăng ký</a></li>
                @endif


            </ul>
            <form action="search/{key}" method="get" style="margin-left: 60px;" class="navbar-form navbar-left" role="search">
                @csrf
                <div class="form-group">
                    <input name="key" type="text" class="form-control" placeholder="Nhập từ khóa...">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>
</nav>
<!-- END nav -->
