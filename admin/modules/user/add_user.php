<?php			

 $sqlUser = "SELECT * FROM users";
 $resultAll = mysqli_query($conn, $sqlUser);


        if(isset($_POST['sbm'])) {
          
             if(empty($_POST['user_name'])) {
                 $errors['user_name'] = "Bạn chưa nhập tên người dùng";
             }else{
                 $user_name = $_POST['user_name'];
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

             $user_phone =  $_POST['user_phone'];
             $user_address =  $_POST['user_address'];
			 $user_name = $_POST['user_name'];
             $user_mail =  $_POST['user_mail'];
             $user_pass =  $_POST['user_pass'];
			 $user_level = $_POST['user_level'];
			 if(!isset($errors['user_name']) && !isset($errors['user_mail']) && !isset($error['user_pass']) && !isset($error['user_address'] )&& !isset($error['user_phone']) ) {
			 $sqlUser = "INSERT INTO 
			 users( user_name,user_mail,user_pass,user_level,user_address,user_phone)
					 VALUES
					('$user_name','$user_mail','$user_pass','$user_level','$user_address','$user_phone' )";

			if(mysqli_query($conn, $sqlUser)) {
 			header("location:index.php?page=user");
			}else{			
 			echo "<script>alert('Thêm tài khoản không thành công!');</script>";
			}}
			}
			 ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý thành viên</a></li>
            <li class="active">Thêm thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">

                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Họ & Tên</label>
                                <input name="user_name"  class="form-control" placeholder="">
                                <span style="color:red"><?php if(isset($errors['user_name'])) echo $errors['user_name']; ?></span>

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="user_mail"  type="text" class="form-control">
								<span style="color:red"><?php if(isset($errors['user_mail'])) echo $errors['user_mail']; ?></span>
                            </div>
                            <div class="form-group">
								<label>Số Điện Thoại</label>
								<input type="text" name="user_phone"   class="form-control">
								<span style="color:red"><?php if(isset($errors['user_phone'])) echo $errors['user_phone']; ?></span>
							</div>
							<div class="form-group">
								<label>Địa chỉ</label>
								<input type="text" name="user_address"   class="form-control">
								<span style="color:red"><?php if(isset($errors['user_address'])) echo $errors['user_address']; ?></span>
							</div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="user_pass"  type="password" class="form-control">
								<span style="color:red"><?php if(isset($errors['user_pass'])) echo $errors['user_pass']; ?></span>
                            </div>

                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option <?php  echo "selected"; ?> value=1>Admin</option>
                                    <option <?php  echo "selected"; ?> value=2>Member</option>
                                </select>
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->