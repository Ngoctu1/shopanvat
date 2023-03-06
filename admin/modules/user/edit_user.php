<?php

 $sqlUser = "SELECT * FROM users";
 $resultAll = mysqli_query($conn, $sqlUser);


    if(isset($_GET['users_id'])) {
        $user_id = $_GET['users_id'];
        $sqlUser = "SELECT * FROM users WHERE users_id = $user_id";
        $resultUsers = mysqli_query($conn, $sqlUser);
        if(mysqli_num_rows($resultUsers)) {
            $users = mysqli_fetch_assoc($resultUsers);
        }

        if(isset($_POST['sbm'])) {
             if(empty($_POST['users_name'])) {
                 $errors['users_name'] = "Bạn chưa nhập tên người dùng";
             }else{
                 $user_name = $_POST['users_name'];
             }

			 if(empty($_POST['user_mail'])) {
                 $errors['user_mail'] = "Bạn chưa nhập mail tài khoản ";
             }else{
                 $user_mail = $_POST['user_mail'];
             }

			 if(empty($_POST['user_pass'])) {
                 $errors['user_pass'] = "Bạn chưa nhập pass tài khoản";
             }else{
                 $user_pass = $_POST['user_pass'];
             }
			 
			 if(empty($_POST['user_phone'])) {
				$errors['user_phone'] = "Bạn chưa nhập số điện thoại tài khoản";
			}else{
				$user_phone = $_POST['user_phone'];
			}
			
			if(empty($_POST['user_address'])) {
				$errors['user_address'] = "Bạn chưa nhập địa chỉ tài khoản";
			}else{
				$user_address = $_POST['user_address'];
			}


			
			 $user_name = $_POST['users_name'];
             $user_mail =  $_POST['user_mail'];
             $user_pass =  $_POST['user_pass'];
             $user_phone =  $_POST['user_phone'];
             $user_address =  $_POST['user_address'];
			 $user_level = $_POST['user_level'];

			 if(!isset($errors['users_name']) && !isset($errors['user_mail']) && !isset($error['user_pass'])&& !isset($error['user_address'] )&& !isset($error['user_phone'])) {
            $sqlUpdate = "UPDATE users SET
			
							user_mail = '$user_mail',
							user_phone = '$user_phone',
							user_address = '$user_address',
							user_pass = '$user_pass',
							user_name = '$user_name',
							user_level = $user_level
                            WHERE user_id = $user_id";
			 
            if(mysqli_query($conn, $sqlUpdate)) {
                header("location:index.php?page=user");

            }else{
                echo "<script>alert('Sửa tài khoản không thành công!');</script>";
            }
		}
		}
        }
    
 
 

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="">Quản lý thành viên</a></li>
			<li class="active"><?php echo $users['users_name'];?></li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thành viên: <?php echo $users['users_name'];?></h1>
		</div>
	</div><!--/.row-->
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-8">
						 
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Họ & Tên</label>
								<input type="text" name="users_name" class="form-control" value="<?php echo $users['users_name']; ?>" placeholder="">
								<span style="color:red"><?php if(isset($errors['users_name'])) echo $errors['users_name']; ?></span>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="user_mail"  value="<?php echo $users['user_mail']; ?>" class="form-control">
								<span style="color:red"><?php if(isset($errors['user_mail'])) echo $errors['user_mail']; ?></span>
							</div>        
							<div class="form-group">
								<label>Số Điện Thoại</label>
								<input type="text" name="user_phone"  value="<?php echo $users['user_phone']; ?>" class="form-control">
								<span style="color:red"><?php if(isset($errors['user_phone'])) echo $errors['user_phone']; ?></span>
							</div>
							<div class="form-group">
								<label>Địa chỉ</label>
								<input type="text" name="user_address"  value="<?php echo $users['user_address']; ?>" class="form-control">
								<span style="color:red"><?php if(isset($errors['user_address'])) echo $errors['user_address']; ?></span>
							</div>

							<div class="form-group">
								<label>Mật khẩu</label>
								<input type="password" name="user_pass"  value="<?php echo $users['user_pass']; ?>"  class="form-control">
								<span style="color:red"><?php if(isset($errors['user_pass'])) echo $errors['user_pass']; ?></span>
							</div>
						
							<div class="form-group">
								<label>Quyền</label>
								<select name="user_level" class="form-control">
                                    <option <?php if($users['user_level'] == 1) echo "selected"; ?> value=1>Admin</option>
                                    <option <?php if($users['user_level'] == 2) echo "selected"; ?> value=2>Member</option>
                                </select>
							</div>
							<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
							<button type="reset" class="btn btn-default">Làm mới</button>
						</div>
					</form>
					
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	
</div>	<!--/.main-->	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>	