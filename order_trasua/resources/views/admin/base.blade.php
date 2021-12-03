<!DOCTYPE html>
<html>
<head>
<title>Dashboard | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" >
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


<link rel="stylesheet" href="{{asset('backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" type="text/css"/>

<link rel="icon" href="{{asset('backend/images/logo-icon.png')}}" type="image/gif">
<!-- calendar -->


<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>

<script src="{{asset('backend/js/bootstrap-tagsinput.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<section id="container">

<header class="header fixed-top clearfix">

<div class="brand">
    <a target="_blank" href="{{url('/')}}" class="logo">
       Home
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>


<div class="top-nav clearfix">

    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
       
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{ asset ('backend/images/2.png') }}">
                <span class="username">
                	
                    

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="#"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</div>
</header>
<aside>
    <div id="sidebar" class="nav-collapse">
        
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                </li>
                <li class="sub-menu" >
                    <a href="javascript:;">
                        <i class="fa fa-cart-arrow-down" ></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="#">Quản lý đơn hàng</a></li>
						
                      
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="#">Thêm danh mục sản phẩm</a></li>
						<li><a href="#">Liệt kê danh mục sản phẩm</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-commenting"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Liệt kê bình luận</a></li>
                    </ul>
                </li>
              
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-coffee"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="#">Thêm sản phẩm</a></li>
						<li><a href="#">Liệt kê sản phẩm</a></li>
                      
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span>Thống kê</span>
                    </a>
				</li>   
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
</section>
<!--sidebar end-->
<!--main content start-->
</section>
<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/simple.money.format.js')}}"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('backend/js/jquery.form-validator.min.js')}}"></script>
<script>
	CKEDITOR.replace( 'ckeditor' );
</script>
</body>
</html>
