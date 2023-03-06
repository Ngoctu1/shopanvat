<?php
//Nếu ISLOGGED đã tồn tại tức là đã chạy qua index.php thì không chạy vào trong if
//Nếu ISLOGGED chưa tồn tại tức là chưa chạy qua index.php thì chạy vào trong if và sẽ chuyển hướng về index.php để kiểm tra session.

$sqlUser = "SELECT * FROM users ";
$resultAll = mysqli_query($conn, $sqlUser);
if (!defined("ISLOGGED")) { //!true => false
	header("location: index.php");
}

//Kiểm tra đăng nhập
if (isset($_POST['login'])) {
	//validate email
	if (empty($_POST['email'])) { //nếu người dùng chưa nhập email thì sẽ tạo biến $error['email'] chứa nội dung thông báo lỗi.
		$error['email'] = "Bạn chưa nhập email";
	} else {
		$email = trim($_POST['email']); //nếu người dùng đã nhập email thì gán giá trị cho biến $email
	}

	//validate password
	if (empty($_POST['password'])) {
		$error['password'] = "Bạn chưa nhập password";
	} else {
		$password = $_POST['password'];
	}



	//Khi không có lỗi nào thì mới bắt đầu kiểm tra tài khoản đăng nhập đúng không
	if (!isset($error['email']) && !isset($error['password'])) { //!false && !false
		//Nếu tài khoản tồn tại thì tạo session và chuyển người dùng tới trang admin.php
		$sqlLogin = "SELECT * FROM users WHERE user_mail = '$email' && user_pass='$password' ";
		$result = mysqli_query($conn, $sqlLogin); //thực hiện câu lệnh truy vấn
		$count = mysqli_num_rows($result); //số bản ghi lấy được từ CSDL
		if ($count > 0) {
			$user_login_info = mysqli_fetch_assoc($result);
			$_SESSION['user_login1'] = $user_login_info;


			if ($user_login_info['user_level']  == 1) {

				header("location: admin.php");
			} else {
				$error['invalid'] = '<div class="alert alert-danger">Chỉ tài khoản admin có thể truy cập !</div>';
				unset($_SESSION['user_level']);
			}
		} else {
			//nếu không đúng thì tạo ra thông báo lỗi.
			$error['invalid'] = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
		}
		/*}
			if($email == "admin@gmail.com" && $password== "123456") {
				$_SESSION['email'] = $email;
				header("location: admin.php");
			}else{
				//nếu không đúng thì tạo ra thông báo lỗi.
				$error['invalid'] = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
			}*/
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> An Vat Viet - Administrator</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">An Vat Viet - Administrator</div>
				<div class="panel-body">
					<?php if (isset($error['invalid']))  echo $error['invalid']; ?>
					<form role="form" action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
								<span style="color:red"><?php if (isset($error['email']))  echo $error['email']; ?></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
								<span style="color:red"><?php if (isset($error['password']))  echo $error['password']; ?></span>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>