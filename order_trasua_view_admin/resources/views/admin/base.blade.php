<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >

	<meta name="csrf-token" content="{{csrf_token()}}">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
	<link href="{{asset('backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/> 


	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
	<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


	<link rel="stylesheet" href="{{asset('backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>

	<link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" type="text/css"/>

	<link rel="icon" href="{{asset('public/frontend/images/logo-mail.png')}}" type="image/gif" sizes="32x32">
	<!-- calendar -->


	<!-- //calendar -->
	<!-- //font-awesome icons -->
	<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>

	<script src="{{asset('backend/js/bootstrap-tagsinput.js')}}"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
	<section id="container">
	<!--header start-->
		<header class="header fixed-top clearfix">
		<!--logo start-->
		<div class="brand">
			<a target="_blank" href="{{url('/')}}" class="logo">
			Shop
			</a>
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars"></div>
			</div>
		</div>
		<!--logo end-->

		<div class="top-nav clearfix">
			<!--search & user info start-->
			<ul class="nav pull-right top-menu">
				<li>
					<input type="text" class="form-control search" placeholder=" Search">
				</li>
				<!-- user login dropdown start-->
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img alt="" src="{{('public/backend/images/2.png')}}">
						<span class="username">
							
							<

						</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu extended logout">
						<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
						<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
						<li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
					</ul>
				</li>
				<!-- user login dropdown end -->
			
			</ul>
			<!--search & user info end-->
		</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a class="active" href="{{URL::to('/dashboard')}}">
								<i class="fa fa-dashboard"></i>
								<span>Tổng quan</span>
							</a>
						</li>
						
						<li>
							<a href="{{URL::to('/information')}}">
								<i class="fa fa-dashboard"></i>
								<span>Thông tin website</span>
							</a>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Sản phẩm</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/product_create')}}">Thêm sản phẩm</a></li>
								<li><a href="{{URL::to('/product_list')}}">Liệt kê sản phẩm</a></li>
							
							</ul>
						</li>
						
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Danh mục sản phẩm</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/category_create')}}">Thêm danh mục sản phẩm</a></li>
								<li><a href="{{URL::to('/category_list')}}">Liệt kê danh mục sản phẩm</a></li>
							
							</ul>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Size</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/size_create')}}">Thêm size</a></li>
								<li><a href="{{URL::to('/size_list')}}">Liệt kê size</a></li>
							
							</ul>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Topping</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/topping_create')}}">Thêm topping</a></li>
								<li><a href="{{URL::to('/topping_list')}}">Liệt kê topping</a></li>
							
							</ul>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Bình luận</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/comment_list')}}">Liệt kê bình luận</a></li>
							</ul>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Đơn hàng</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>
								
							
							</ul>
						</li>
						
					
						
						
						
						{{-- @impersonate
						<li>
						
							<span><a href="{{URL::to('/impersonate-destroy')}}">Stop chuyển quyền</a></span>
						
						</li>
						@endimpersonate

						@hasrole(['admin','author']) --}}
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Users</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
								<li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
							
							</ul>
						</li>

						{{-- @endhasrole --}}
					
					</ul>            
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				@yield('admin_content')
			</section>
		</section>
	<!--main content end-->
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
<script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true
        });
    });
</script>

{{-- <script>
	CKEDITOR.replace('my-editor');
</script> --}}
</body>
</html>

	
