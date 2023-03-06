<?php 
	//Nếu ISLOGGED đã tồn tại tức là đã chạy qua index.php thì không chạy vào trong if
	//Nếu ISLOGGED chưa tồn tại tức là chưa chạy qua index.php thì chạy vào trong if và sẽ chuyển hướng về index.php để kiểm tra session.
	if(!defined("ISLOGGED")) {
		header("location: index.php");
	}
	//session_start();

	// if($_SESSION['user_level'] = 2){
	// 	header("location: logout.php");

	// }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><span>Ăn Vặt</span> Việt</a>
					<ul class="user-menu">
						<li class="dropdown pull-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['user_login1']['users_name']?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
								<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
							</ul>
						</li>
					</ul>
				</div>
								
			</div>
		</nav>
		<!-- /.container-fluid -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="index.php?page=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<!-- <li><a href="index.php?page=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li> -->
			<li><a href="index.php?page=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="index.php?page=order"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Quản lý đơn hàng</a></li>
			<li><a href="index.php?page=comment"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			
		</ul>

	</div>
	<!--/.sidebar-->
	
	<!-- Main content -->
	<?php 
		// switch-case
		if(isset($_GET['page'])){
			switch ($_GET['page']) {
				// category
				case 'category':
					require_once "modules/category/category.php";
					break;
				case 'add_category':
					require_once "modules/category/add_category.php";
					break;
				case 'edit_category':
					require_once "modules/category/edit_category.php";
					break;
				//Product
				case 'product':
					require_once "modules/product/product.php";
					break;
				case 'edit_product':
					require_once "modules/product/edit_product.php";
					break;
				case 'add_product':
					require_once "modules/product/add_product.php";
					break;
				// user
				case 'user':
					require_once "modules/user/user.php";
					break;
				case 'add_user':
					require_once "modules/user/add_user.php";
					break;
				case 'edit_user':
					require_once "modules/user/edit_user.php";
					break;
				// order
				case 'order':
					require_once "modules/order/order.php";
					break;
				case 'order_detail':
					require_once "modules/order/order_detail.php";
					break;
				case 'order_processed':
					require_once "modules/order/order_processed.php";
					break;		
				case 'process':
					require_once "modules/order/process.php";
					break;	
				//test		
				case 'test':
					require_once "test.php";
					break;		
			}
		}else{
			require_once "static.php";
		}
	?>
</body>

</html>
